<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Keywordgroup;
use Illuminate\Http\Request;
use Carbon\Carbon;

class KeywordgroupController extends Controller
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$keywordgroups = Keywordgroup::latest()->get();
		return view('keywordgroup.index', compact('keywordgroups'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('keywordgroup.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, ['name' => 'required|unique:keywordgroups|string']); // Uncomment and modify if you need to validate any input.
		Keywordgroup::create($request->all());
		return redirect('keywordgroup');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$keywordgroup = Keywordgroup::findOrFail($id);
		return view('keywordgroup.show', compact('keywordgroup'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$keywordgroup = Keywordgroup::findOrFail($id);
		return view('keywordgroup.edit', compact('keywordgroup'));
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
		$keywordgroup = Keywordgroup::findOrFail($id);
		$keywordgroup->update($request->all());
		return redirect('keywordgroup');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Keywordgroup::destroy($id);
		return redirect('keywordgroup');
	}

}
