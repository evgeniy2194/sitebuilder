<?php 

namespace App;

use App\Exceptions\DomainNotFoundException;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

/**
 * App\Page
 *
 * @property integer $id
 * @property string $name
 * @property mixed $body
 * @property integer $keyword_id
 * @property integer $domain_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read Domain $domain
 * @property-read Keyword $keyword
 * @method static \Illuminate\Database\Query\Builder|\App\Page whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Page whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Page whereBody($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Page whereKeywordId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Page whereDomainId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Page whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Page whereUpdatedAt($value)
 */
class Page extends Model
{

    use PresentableTrait;
    protected $presenter = \Acme\Presenters\PagePresenter::class;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pages';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'body', 'domain_id', 'keyword_id'];

    public function domain()
    {
        return $this->belongsTo(Domain::class);
    }

    public function keyword()
    {
        return $this->belongsTo(Keyword::class);
    }

    public function scopeActive($query)
    {
        return $query->where('content_delivered', 1);
    }

    public function getBodyAttribute($value)
    {
        return gzinflate($value);
    }

    public function setBodyAttribute($value)
    {
        $this->attributes['body'] = gzdeflate($value, 9);
    }

    // Send request to the ghetto content API
    public function requestContent()
    {
        $base_url   = getenv('CONTENT_API_BASE_URL');
        $endpoint   = 'search';
        $parameters = '?query='.urlencode($this->keyword->name).'&webhook_url='.urlencode($this->present()->webhookURL());
        $request_url= $base_url.$endpoint.$parameters;

        $client     = new \GuzzleHttp\Client();
        $client->get($request_url);

        $this->content_requested = 1;
        $this->save();
    }

    // Receive content from webhook
    public function receiveContent($data)
    {
        /*
         * Format that the payload is built with
         *
        $output = json_encode([
            'keyword'       => $this->searchquery->name,
            'content'       => $text_output,
            'word_count'    => $resulting_word_count,
            'images'        => $images_output,
            'videos'        => $videos_output
        ]);
        */

        if(isset($data['content']))
        {
            $this->name                 = $this->keyword->name;
            $this->slug                 = str_slug($this->name);
            $this->body                 = $data['content'];
            $this->content_delivered    = 1;
            $this->save();
        }
    }

    public static function createPages($domain_id, $page_count)
    {
        $domain = Domain::find($domain_id);
        if($domain === null)
            throw new DomainNotFoundException;

        // Are there existing pages on this domain?
        // If so, ensure that we don't pull keywords that are already on this domain.
        $keyword_ids = [];
        if($domain->pages()->count())
        {
            $keyword_ids = $domain->pages()->lists('keyword_id');
        }

        // Acquire keywords
        $keywords = [];
        if($domain->keywordgroup->keywords()->count() >= $page_count)
            $keywords = $domain->keywordgroup
                        ->keywords()
                        ->whereNotIn('id', $keyword_ids)
                        ->orderByRaw("RAND()")
                        ->take($page_count)
                        ->get();

        $created = 0;
        if(count($keywords) > 0)
        {
            foreach($keywords as $keyword)
            {
                $page = self::create([
                    'domain_id' => $domain_id,
                    'keyword_id'=> $keyword->id
                ]);
                if($page)
                    $created++;
            }
        }

        return $created;
    }

}
