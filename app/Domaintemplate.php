<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class Domaintemplate extends Model
{

    use PresentableTrait;
    protected $presenter = \Acme\Presenters\DomaintemplatePresenter::class;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table    = 'domaintemplates';
    protected $guarded  = ['id', 'created_at'];

    public function domains()
    {
        return $this->hasMany(Domain::class);
    }

    public function templateBasePath()
    {
        return 'site.templates.'.mb_strtolower(str_slug($this->name));
    }

    public function templateIndexPath()
    {
        return $this->templateBasePath().'.index';
    }

    public function templatePagePath()
    {
        return $this->templateBasePath().'.page';
    }

}
