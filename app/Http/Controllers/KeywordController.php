<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Keyword;
use App\Keywordgroup;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Laracasts\Flash\Flash;

class KeywordController extends Controller
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$keywords = Keyword::latest()->get();
		return view('keyword.index', compact('keywords'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('keyword.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
        $keywords = $request->get('keywords');

        // Break down keyword string into an array
        if(mb_stristr($keywords, "\r\n"))
        {
            $keywords = explode("\r\n", $keywords);
        }
        else
        {
            $keywords = [$keywords];
        }

        // Get rid of empties
        foreach($keywords as $key => $keyword)
        {
            if($keyword == '')
                unset($keywords[$key]);
        }

        if( ! $request->has('keywordgroup_id'))
        {
            Flash::error('No keyword group supplied');
            return back();
        }

        $keywordgroup_id            = $request->get('keywordgroup_id');
        $keywordgroup               = Keywordgroup::find($keywordgroup_id);
        $data['keywordgroup_id']    = $keywordgroup_id;
        foreach($keywords as $kw)
        {
            $data['name'] = $kw;
            // This name validation rule will confirm that a keyword->name is unique to the supplied keywordgroup

            $validator = Validator::make($data, [
                'keywordgroup_id'   => 'integer|required',
                'name'              => 'required|string|max:255|unique:keywords,name,NULL,id,keywordgroup_id,'.$keywordgroup_id
            ]);

            if($validator->passes())
            {
                $keywordgroup->keywords()->create($data);
            }
        }

        return redirect('/keywordgroup/'.$keywordgroup_id);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$keyword = Keyword::findOrFail($id);
		return view('keyword.show', compact('keyword'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$keyword = Keyword::findOrFail($id);
		return view('keyword.edit', compact('keyword'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
        $this->validate($request, [
            'name'              => 'required|string|max:255'
        ]);
		$keyword = Keyword::findOrFail($id);
		$keyword->update($request->all());
		return redirect('keywordgroup/'.$keyword->keywordgroup->id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $keyword            = Keyword::find($id);
        $keywordgroup_id    = $keyword->keywordgroup->id;
		Keyword::destroy($id);
		return redirect('keywordgroup/'.$keywordgroup_id);
	}

    public function getGenerate()
    {
        return view('keyword.generate');
    }

    public function postGenerate(Request $request)
    {
        $before = $request->get('before');
        $root   = $request->get('root');
        $after  = $request->get('after');

        if(mb_stristr($before, "\r\n"))
            $before = explode("\r\n", $before);
        else
        {
            if(mb_strlen($before))
                $before = [$before];
            else
                $before = null;
        }

        if(mb_stristr($root, "\r\n"))
            $root = explode("\r\n", $root);
        else
        {
            if(mb_strlen($root))
                $root = [$root];
            else
                $root = null;
        }

        if(mb_stristr($after, "\r\n"))
            $after = explode("\r\n", $after);
        else
        {
            if(mb_strlen($after))
                $after = [$after];
            else
                $after = null;
        }

        $generated = [];

        // Add root words first
        if($root !== null && count($root) > 0)
        {
            foreach($root as $kw)
            {
                $generated[] = $kw;
            }
        }

        // Add root word + prefix
        if($root !== null && count($root) > 0 && $before !== null && count($before) > 0)
        {
            foreach($root as $kw)
            {
                foreach($before as $prefix)
                {
                    $generated[] = $prefix.' '.$kw;
                }
            }
        }

        // Add root word + suffix
        if($root !== null && count($root) > 0 && $after !== null && count($after) > 0)
        {
            foreach($root as $kw)
            {
                foreach($after as $suffix)
                {
                    $generated[] = $kw.' '.$suffix;
                }
            }
        }

        // Add all three
        if($root !== null && count($root) && $before !== null && count($before) > 0 && $after !== null && count($after) > 0)
        {
            foreach($root as $kw)
            {
                foreach($before as $prefix)
                {
                    foreach($after as $suffix)
                    {
                        $generated[] = $prefix.' '.$kw.' '.$suffix;
                    }
                }
            }
        }

        // Remove duplicates
        $final = [];
        foreach($generated as $kw)
        {
            if( !in_array($kw, $final))
                $final[] = $kw;
        }
        $generated = $final;

        return view('keyword.generate', compact('before', 'root', 'after', 'generated'));
    }

}
