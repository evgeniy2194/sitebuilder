<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domaingroup extends Model
{

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

}
