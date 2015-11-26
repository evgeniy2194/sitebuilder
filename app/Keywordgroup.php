<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

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
