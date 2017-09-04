<?php

namespace Acme\Scraper\Sources;

use Acme\Scraper\Scraper;
use ForceUTF8\Encoding;
use Symfony\Component\DomCrawler\Crawler;

class Google extends Scraper
{

    var $url                    = "http://www.google.com/search";
    var $get_parameter          = "?";
    var $get_concatenator       = "&";
    var $query_parameter        = "q=";
    var $safe_parameter         = "safe=";
    var $pagination_parameter   = "start=";

    /**
     * Issue a search to Google
     *
     * @param $search_query
     * @param int $page_depth
     * @return array
     */
    public function search($search_query, $page_depth = 1)
    {
        $safe_mode          = "off";
        $query              = urlencode($search_query);
        $results            = [];
        $pages_completed    = 0;

        while($pages_completed < $page_depth)
        {
            // Build URL
            $url = $this->url.$this->get_parameter.$this->query_parameter.$query.$this->get_concatenator.$this->safe_parameter.$safe_mode;
            // Build offset for pagination
            if($pages_completed > 0)
            {
                $offset = $pages_completed * 10;
                $url    .= $this->get_concatenator.$this->pagination_parameter.$offset;
            }

            // Request the page
            $content    = $this->GET($url);
            // Parse the results
            $results[]  = $this->extractResultsFromSearch($content);
            // If the pages completed is greater than 0 we'll issue a short pause
            if($pages_completed > 0)
                sleep(1);

            $pages_completed++;
        }

        return $results;
    }

    /**
     * Parse results from Google SERP
     *
     * @param Crawler $content
     * @return array
     */
    public function extractResultsFromSearch(Crawler $content)
    {
        $results    = [];
        $items      = $content->filter('div.g')->each(function($node)
        {
            $title          = null;
            $url            = null;
            $snippet        = null;

            // Filter the node looking for the proper results
            $temp_title     = $node->filter('h3.r');
            $temp_snippet   = $node->filter('span.st');
            $temp_url       = $node->filter('h3.r > a');

            // Make sure there's a result after filtering
            if($temp_url->count())
                $url        = $temp_url->attr('href');
            if($temp_title->count())
                $title      = $temp_title->text();
            if($temp_snippet->count())
                $snippet    = $temp_snippet->text();

            // If none of the values are empty return the array
            if( ! is_null($title) && ! is_null($url) && ! is_null($snippet))
            {
                // Remove the pre-pended "/url?q=" that google ads to the URL's
                $url        = str_replace('/url?q=', '', $url);
                // Remove the appended "&sa=" etc etc that google ads to the URL
                $url        = substr($url, 0, strpos($url, "&sa"));
                if(mb_stripos($snippet, '...'))
                {
                    // Remove the ... at the end of snippets and add a normal period
                    $snippet = str_replace('...', '.', $snippet);
                }

                $snippet = str_replace(" .", '.', $snippet);
                $snippet = str_replace("&nbsp;.", '.', $snippet);
                $snippet = str_replace("\n", '', $snippet);

                $item['title']  = Encoding::toUTF8($title);
                $item['url']    = Encoding::toUTF8($url);
                $item['snippet']= Encoding::toUTF8($snippet);

                return $item;
            }
        });

        // Remove empty array values
        foreach($items as $item)
        {
            if(is_array($item))
                $results[] = $item;
        }

        return $results;
    }

}
