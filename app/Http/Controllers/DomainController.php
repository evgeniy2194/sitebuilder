<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Domain;
use App\Keywordgroup;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Domaingroup;
use Illuminate\Support\Facades\Validator;
use Laracasts\Flash\Flash;

class DomainController extends Controller
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$domains = Domain::latest()->get();

		return view('domain.index', compact('domains'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('domain.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
        $domains = $request->get('domains');

        // Break down domains string into an array
        if(mb_stristr($domains, "\r\n"))
        {
            $domains = explode("\r\n", $domains);
        }
        else
        {
            $domains = [$domains];
        }

        // Get rid of empties
        foreach($domains as $key => $domain)
        {
            if($domain == '')
                unset($domains[$key]);
        }

        if( ! $request->has('domaingroup_id'))
        {
            Flash::error('No domain group supplied');
            return back();
        }

        if( ! $request->has('keywordgroup_id'))
        {
            Flash::error('No keyword group supplied');
            return back();
        }

        $domaingroup_id            = $request->get('domaingroup_id');
        $keywordgroup_id           = $request->get('keywordgroup_id');
        $domaingroup               = Domaingroup::find($domaingroup_id);

        $data['domaingroup_id']    = $domaingroup_id;
        $data['keywordgroup_id']   = $keywordgroup_id;
        foreach($domains as $domain)
        {
            $data['name'] = $domain;
            // This name validation rule will confirm that a domain->name is unique to the supplied domain group
            $validator = Validator::make($data, [
                'domaingroup_id'    => 'integer|required',
                'keywordgroup_id'   => 'integer|required',
                'name'              => 'required|string|max:255|unique:domains,name,NULL,id,domaingroup_id,'.$domaingroup_id
            ]);

            if($validator->passes())
            {
                $domaingroup->domains()->create($data);
            }
        }

        return redirect('/domaingroup/'.$domaingroup_id);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$domain = Domain::findOrFail($id);

		return view('domain.show', compact('domain'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$domain = Domain::findOrFail($id);

		return view('domain.edit', compact('domain'));
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
            'name'              => 'required',
            'domaintemplate_id' => 'required|exists:domaintemplates,id',
            'keywordgroup_id'   => 'required|exists:keywordgroups,id'
        ]);

		$domain = Domain::findOrFail($id);
		$domain->update($request->all());

        Flash::success('Domain updated.');

		return redirect('domain/'.$domain->id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Domain::destroy($id);

		return redirect('domain');
	}

}
