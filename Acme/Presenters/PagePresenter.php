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

    public function webhookURL()
    {
        return \Config::get('app.url').'/webhooks/content/page/'.$this->id;
    }

    public function url()
    {
        return $this->slug;
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

    public function pageURL()
    {
        return $this->entity->slug;
    }

    public function pageBody()
    {
        $body = $this->entity->body;

        // Reformat reddit link syntax to html links
        $body = preg_replace_callback(
            '~\[([^\]]+)\]\(([^)]+)\)~',
            function ($m) {

                $url    = $m[2];
                $anchor = $m[1];

                // If there's no domain to the link, drop it
                if(substr($url, 0, 1) == '/')
                    return '';

                // Strip links to specific domains
                $banned_domains = \Config::get('sitebuilder.remove_links_from_these_domains');
                if(count($banned_domains) > 0)
                {
                    foreach($banned_domains as $banned_domain)
                    {
                        if(mb_stristr($url, $banned_domain))
                            return '';
                    }
                }

                return '<a href="'.$url.'" rel="nofollow">'.$anchor.'</a>';
            },
            $body
        );

        return $body;
    }

    public function pageSummary($char_limit = 300)
    {
        $body = $this->pageBody();
        return string($body)->tease($char_limit)." <a href='/".$this->pageURL()."'>See more</a>";
    }

    public function pagePostDate()
    {
        return $this->entity->created_at->toDateString();
    }

}