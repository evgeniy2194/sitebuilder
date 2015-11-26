<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

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
        return $this->belongsTo(DomainGroup::class);
    }

    public function keywordgroup()
    {
        return $this->belongsTo(Keywordgroup::class);
    }

}
