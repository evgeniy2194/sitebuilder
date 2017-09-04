<?php

namespace Acme\Scraper;

use Goutte\Client;

class Scraper
{

    public function GET($url)
    {
        $client = new Client();
        $return = $client->request('GET', $url);

        return $return;
    }

}