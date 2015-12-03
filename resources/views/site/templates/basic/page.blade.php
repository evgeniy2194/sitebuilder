@extends('site.templates.basic.layout')

@section('title') {!! $page->present()->pageTitle() !!} - {!! $page->domain->name !!} @endsection

@section('content')

    <h1>{!! $page->present()->pageTitle() !!}</h1>

    <p>
        <a href="/">Back home</a>
    </p>

    <p>
        {!! $page->present()->pageBody() !!}
    </p>

@endsection