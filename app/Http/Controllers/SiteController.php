<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Domain;

class SiteController extends Controller
{

    public function index()
    {
        $domain = Domain::getDomainFromRequest();

        return view($domain->domaintemplate->templateIndexPath())->with('domain', $domain);
    }

    public function page($slug)
    {
        $domain     = Domain::getDomainFromRequest();

        // Cache this query
        // Todo: this may be a bad idea given no sanitation of this slug/string - look into that
        $key        = $domain->id.'_'.$slug.'_page';
        $update     = false;
        if(\Cache::has($key))
        {
            $page   =  \Cache::get($key);
        }
        else
        {
            $page   = $domain->pages()->whereSlug($slug)->first();
            $update = true;
        }

        if($page)
        {
            if($update)
                \Cache::put($key, $page, 90);

            return view($domain->domaintemplate->templatePagePath())->with('page', $page);
        }

        return abort(404);
    }

}
