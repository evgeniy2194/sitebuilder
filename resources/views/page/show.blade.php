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

    <h1>Page</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Page Title</th>
                    <th>Domain</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> {{ $page->present()->pageTitle() }} </td>
                    <td> {{ $page->domain->name }} </td>
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
            			{!! $page->body !!}
            	  </div>
            </div>
        </div>
    </div>

@endsection