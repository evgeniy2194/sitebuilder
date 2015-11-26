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

}
