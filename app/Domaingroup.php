<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

/**
 * App\Domaingroup
 *
 * @property integer $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|Domain[] $domains
 * @method static \Illuminate\Database\Query\Builder|\App\Domaingroup whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Domaingroup whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Domaingroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Domaingroup whereUpdatedAt($value)
 */
class Domaingroup extends Model
{
    use PresentableTrait;
    protected $presenter = \Acme\Presenters\DomaingroupPresenter::class;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'domaingroups';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    public function domains()
    {
        return $this->hasMany(Domain::class);
    }

}
