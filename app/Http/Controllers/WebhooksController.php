<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class WebhooksController extends Controller
{

    public function receiveContent(Request $request, $page_id)
    {
        $page = Page::find($page_id);

        if($page === null)
            return 'failed';

        $data['keyword']    = $request->input('keyword');
        $data['content']    = $request->input('content');
        $data['word_count'] = $request->input('word_count');
        $data['images']     = $request->input('images');
        $data['video']      = $request->input('video');

        $page->receiveContent($data);

        return 'success';
    }
}
