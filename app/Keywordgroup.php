<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

/**
 * App\Keywordgroup
 *
 * @property integer $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|Keyword[] $keywords
 * @property-read \Illuminate\Database\Eloquent\Collection|Domain[] $domains
 * @method static \Illuminate\Database\Query\Builder|\App\Keywordgroup whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Keywordgroup whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Keywordgroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Keywordgroup whereUpdatedAt($value)
 */
class Keywordgroup extends Model
{

    use PresentableTrait;
    protected $presenter = \Acme\Presenters\KeywordgroupPresenter::class;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'keywordgroups';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    public function keywords()
    {
        return $this->hasMany(Keyword::class);
    }

    public function domains()
    {
        return $this->hasMany(Domain::class);
    }

}
