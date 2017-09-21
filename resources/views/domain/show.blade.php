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

    <h1>Domain
        <a href="{{ url('http://'.$domain->name) }}" target="_blank" class="btn btn-primary pull-right btn-sm">View Site</a>
        <a href="{!! $domain->present()->editURL() !!}"><button type="submit" class="btn btn-warning btn-sm pull-right">Edit</button></a>
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Domain Group</th>
                    <th>Keyword Group</th>
                    <th>Template</th>
                    <th class="text-center">Pages</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> <strong>{{ $domain->name }}</strong> </td>
                    <td> {!! $domain->domaingroup->present()->adminLink() !!} </td>
                    <td> {!! $domain->keywordgroup->present()->adminLink() !!}</td>
                    <td> {!! $domain->domaintemplate->present()->adminLink() !!}</td>
                    <td class="text-center">{!! $domain->pages()->count() !!}</td>
                </tr>
            </tbody>    
        </table>
    </div>

    <h3>Pages @if($domain->pages()->where('content_delivered', 0)->count()) <small>({!! $domain->pages()->where('content_delivered', 0)->count() !!} Pending Pages)</small> @endif <a href="{{ url('/page/create'.'?domain_id='.$domain->id) }}" class="btn btn-primary pull-right btn-sm">Add Pages</a></h3>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <th>Name</th>
                <th>Keyword / Group</th>
                <th class="text-right">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($domain->pages as $item)
                <tr class="@if($item->content_delivered === 0) warning @endif">
                    <td><a href="{!! $item->present()->adminURL() !!}">{!! $item->present()->pageTitle() !!}</a></td>
                    <td>{!! $item->keyword->present()->adminLink() !!} / {!! $item->keywordgroup->present()->adminLink() !!}</td>
                    <td class="text-right">
                        <a href="http://{!! $domain->name.'/'.$item->present()->url() !!}" class="btn btn-primary btn-xs" target="_blank">
                            View Page
                        </a>
                        /
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
        <p class="alert alert-warning"><strong>(Pending)</strong> Indicates pages waiting for content</p>
    </div>

@endsection