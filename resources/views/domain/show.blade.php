@extends('layouts.app')

@section('title') {!! $domain->name !!} @endsection

@section('breadcrumbs')

    <ol class="breadcrumb">
    	<li>
    		<a href="/">Home</a>
    	</li>
        <li>
            <a href="/domaingroup">Domain Groups</a>
        </li>
        <li>
            {!! $domain->domaingroup->present()->adminLink() !!}
        </li>
    	<li class="active">Domain: {!! $domain->name !!}</li>
    </ol>

@endsection

@section('content')

    <h1>Domain</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Domain Group</th>
                    <th>Keyword Group</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> <strong>{{ $domain->name }}</strong> </td>
                    <td> {!! $domain->domaingroup->present()->adminLink() !!} </td>
                    <td> {!! $domain->keywordgroup->present()->adminLink() !!}</td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection