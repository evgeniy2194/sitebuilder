<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

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

}
