<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

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
