<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

/**
 * App\Domain
 *
 * @property integer $id
 * @property string $name
 * @property integer $domaingroup_id
 * @property integer $keywordgroup_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read Domaingroup $domaingroup
 * @property-read Keywordgroup $keywordgroup
 * @property-read \Illuminate\Database\Eloquent\Collection|Page[] $pages
 * @method static \Illuminate\Database\Query\Builder|\App\Domain whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Domain whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Domain whereDomaingroupId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Domain whereKeywordgroupId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Domain whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Domain whereUpdatedAt($value)
 */
class Domain extends Model
{
    use PresentableTrait;
    protected $presenter = \Acme\Presenters\DomainPresenter::class;


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'domains';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'domaingroup_id', 'keywordgroup_id'];

    public function domaingroup()
    {
        return $this->belongsTo(Domaingroup::class);
    }

    public function keywordgroup()
    {
        return $this->belongsTo(Keywordgroup::class);
    }

    public function pages()
    {
        return $this->hasMany(Page::class);
    }

    public function domaintemplate()
    {
        return $this->belongsTo(Domaintemplate::class);
    }

    public static function getDomainFromRequest()
    {
        $url_info       = parse_url(\Request::fullUrl());
        $domain_name    = $url_info['host'];
        $key            = $domain_name.'_check';

        if(\Cache::has($key))
            return \Cache::get($key);

        $domain = self::whereName($domain_name)->first();

        \Cache::put($key, $domain, 90);

        return $domain;
    }

}
