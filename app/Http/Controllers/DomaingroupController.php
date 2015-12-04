<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Domaingroup;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DomaingroupController extends Controller
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$domaingroups = Domaingroup::latest()->get();

		return view('domaingroup.index', compact('domaingroups'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('domaingroup.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
            'name' => 'required|unique:domaingroups|string'
        ]);

		Domaingroup::create($request->all());

		return redirect('domaingroup');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$domaingroup = Domaingroup::findOrFail($id);

		return view('domaingroup.show', compact('domaingroup'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$domaingroup = Domaingroup::findOrFail($id);

		return view('domaingroup.edit', compact('domaingroup'));
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
            'name' => 'required'
        ]);

		$domaingroup = Domaingroup::findOrFail($id);
		$domaingroup->update($request->all());

		return redirect('domaingroup');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Domaingroup::destroy($id);

		return redirect('domaingroup');
	}

}
