<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{

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
    protected $fillable = ['name', 'domaingroup_id'];

    public function domaingroup()
    {
        return $this->belongsTo(DomainGroup::class);
    }

}
