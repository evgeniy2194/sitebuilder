@extends('layouts.app')

@section('title') Page - {!! $page->name !!} @endsection

@section('breadcrumbs')

    <ol class="breadcrumb">
        <li>
            <a href="/">Home</a>
        </li>
        <li>
            <a href="/domaingroup">Domain Groups</a>
        </li>
        <li>
            {!! $page->domain->domaingroup->present()->adminLink() !!}
        </li>
        <li>
            {!! $page->domain->present()->adminLink() !!}
        </li>
        <li class="active">{!! $page->present()->pageTitle() !!}</li>
    </ol>

@endsection

@section('content')

    <h1>Page <a href="http://{!! $page->domain->name.'/'.$page->slug !!}" class="btn btn-sm btn-primary pull-right" target="_blank">View Page</a></h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Page Title</th>
                    <th>Slug</th>
                    <th>Keyword</th>
                    <th>Domain</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> {!! $page->present()->pageTitle() !!} </td>
                    <td> {!! $page->slug !!} </td>
                    <td> {!! $page->keyword->present()->adminLink() !!} </td>
                    <td> {!! $page->domain->present()->adminLink() !!} </td>
                </tr>
            </tbody>    
        </table>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
            	  <div class="panel-heading">
            			<h3 class="panel-title">Content</h3>
            	  </div>
            	  <div class="panel-body">
            			{!! $page->present()->pageBody() !!}
            	  </div>
            </div>
        </div>
    </div>

@endsection