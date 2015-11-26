<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{

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
        return $this->belongsTo('\App\Keywordgroup');
    }

}
