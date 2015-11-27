<?php 

namespace App;

use App\Exceptions\DomainNotFoundException;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

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
