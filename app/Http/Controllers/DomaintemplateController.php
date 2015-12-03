<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Domaintemplate;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DomaintemplateController extends Controller
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$domaintemplates = Domaintemplate::latest()->get();
		return view('domaintemplate.index', compact('domaintemplates'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('domaintemplate.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//$this->validate($request, ['name' => 'required']); // Uncomment and modify if you need to validate any input.
		Domaintemplate::create($request->all());
		return redirect('domaintemplate');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$domaintemplate = Domaintemplate::findOrFail($id);
		return view('domaintemplate.show', compact('domaintemplate'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$domaintemplate = Domaintemplate::findOrFail($id);
		return view('domaintemplate.edit', compact('domaintemplate'));
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
		$domaintemplate = Domaintemplate::findOrFail($id);
		$domaintemplate->update($request->all());
		return redirect('domaintemplate');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Domaintemplate::destroy($id);
		return redirect('domaintemplate');
	}

}
