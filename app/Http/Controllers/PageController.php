<?php

namespace App\Http\Controllers;

use App\Domain;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Page;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Laracasts\Flash\Flash;

class PageController extends Controller
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$pages = Page::latest()->get();
		return view('page.index', compact('pages'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('page.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
        $max_pages = 0;
        if($request->has('domain_id'))
            $max_pages = Domain::find($request->get('domain_id'))->keywordgroup->keywords()->count();

		$this->validate($request, [
            'domain_id' => 'required|integer|exists:domains,id',
            'count'     => 'required|integer|max:'.$max_pages
        ]);

        $count          = $request->get('count');
        $domain_id      = $request->get('domain_id');
        $pages_created  = Page::createPages($domain_id, $count);

        if($pages_created > 0)
            Flash::success($pages_created.' pages created.');
        else
            Flash::warning('No pages created');

		return redirect('domain/'.$domain_id);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$page = Page::findOrFail($id);
		return view('page.show', compact('page'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$page = Page::findOrFail($id);
		return view('page.edit', compact('page'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		//$this->validate($request, ['name' => 'required']); // Uncomment and modify if you need to validate any input.
		$page = Page::findOrFail($id);
		$page->update($request->all());
		return redirect('page');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Page::destroy($id);
		return redirect('page');
	}

}
