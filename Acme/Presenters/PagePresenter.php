<?php

namespace Acme\Presenters;

use Laracasts\Presenter\Presenter;

class PagePresenter extends Presenter {

    protected $url_path = '/page';

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

        return link_to($this->adminURL(), $anchor);
    }

    public function pageTitle()
    {
        if($this->entity->name == '' || $this->entity->name == null)
        {
            return $this->entity->keyword->name.' (Pending)';
        }

        return $this->entity->name;
    }

}