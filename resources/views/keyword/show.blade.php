@extends('layouts.app')

@section('title') {!! $keyword->name !!} @endsection

@section('breadcrumbs')

    <ol class="breadcrumb">
        <li>
            <a href="/">Home</a>
        </li>
        <li>
            <a href="/keywordgroup">Keyword Groups</a>
        </li>
        <li>
            {!! $keyword->keywordgroup->present()->adminLink() !!}
        </li>
        <li class="active">Keyword: {!! $keyword->name !!}</li>
    </ol>

@endsection

@section('content')

    <h1>Keyword</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Keyword Group</th>
                    <th class="text-center">Pages</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> {!! $keyword->name !!} </td>
                    <td> {!! $keyword->keywordgroup->present()->adminLink() !!} </td>
                    <td class="text-center">{!! $keyword->pages()->count() !!}</td>
                </tr>
            </tbody>    
        </table>
    </div>

    <h3>Pages</h3>
    @if($keyword->pages()->count())
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Domain</th>
                </tr>
                </thead>
                <tbody>
                @foreach($keyword->pages as $page)
                <tr>
                    <td> {!! $page->present()->adminLink() !!} </td>
                    <td> {!! $page->domain->present()->adminLink() !!} </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="alert alert-warning">This keyword hasn't been used to create a page yet.</p>
    @endif

@endsection