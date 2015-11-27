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
    	<li class="active">{!! $domain->name !!}</li>
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

    <h1>Pages <a href="{{ url('/page/create'.'?domain_id='.$domain->id) }}" class="btn btn-primary pull-right btn-sm">Add Pages</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <th>Name</th>
                <th>Keyword</th>
                <th>Domain</th>
                <th class="text-right">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($domain->pages as $item)
                <tr>
                    <td>{!! link_to($item->present()->adminURL(), $item->present()->pageTitle()) !!}</td>
                    <td>{!! $item->keyword->present()->adminLink() !!}</td>
                    <td>{{ $item->domain->name }}</td>
                    <td class="text-right">
                        <a href="{!! $item->present()->editURL() !!}">
                            <button type="submit" class="btn btn-primary btn-xs">Update</button>
                        </a>
                        /
                        {!! Form::open(['method'=>'delete','action'=>['PageController@destroy',$item->id], 'style' => 'display:inline']) !!}
                        <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection