<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

/**
 * App\Keyword
 *
 * @property integer $id
 * @property string $name
 * @property integer $keywordgroup_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read Keywordgroup $keywordgroup
 * @method static \Illuminate\Database\Query\Builder|\App\Keyword whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Keyword whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Keyword whereKeywordgroupId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Keyword whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Keyword whereUpdatedAt($value)
 */
class Keyword extends Model
{
    use PresentableTrait;
    protected $presenter = \Acme\Presenters\KeywordPresenter::class;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'keywords';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'keywordgroup_id'];

    public function keywordgroup()
    {
        return $this->belongsTo(Keywordgroup::class);
    }

    public function pages()
    {
        return $this->hasMany(Page::class);
    }

}
