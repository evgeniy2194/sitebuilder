<?php

namespace Acme\Presenters;

use Laracasts\Presenter\Presenter;

class DomaingroupPresenter extends Presenter {

    protected $url_path = '/domaingroup';

    public function adminURL()
    {
        return $this->url_path.'/'.$this->id;
    }

    public function editURL()
    {
        return $this->url_path.'/'.$this->id.'/edit';
    }

    public function adminLink($anchor = false)
    {
        if( ! $anchor)
        {
            $anchor = $this->entity->name;
        }

        return "<a href='".$this->adminURL()."'>".$anchor."</a>";
    }

}