@extends('site.templates.basic.layout')

@section('title') {!! $page->present()->pageTitle() !!} - {!! $page->domain->name !!} @endsection

@section('page-header')
    <h1>{!! $page->present()->pageTitle() !!}</h1>
@endsection

@section('sidebar')
    @include('site.templates.basic.partials.sidebar-menu', ['page_view' => true])
@endsection

@section('content')

    <div class="row">
        <div class="col-md-6">
            <a href="/"><< Back home</a>
        </div>
        <div class="col-md-6 text-right">
            <small>Posted: {!! $page->present()->pagePostDate() !!}</small>
        </div>
    </div>

    <hr>

    <p>
        {!! $page->present()->pageBody() !!}
    </p>

@endsection