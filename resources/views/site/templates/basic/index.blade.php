@extends('site.templates.basic.layout')

@section('title') Home - {!! $domain->name !!} @endsection

@section('content')
    <h1>Hello! Welcome to {!! $domain->name !!}!</h1>

    <h3>Pages</h3>
    <ul>
        @foreach($domain->pages()->active()->get() as $page)
            <li>
                <a href="{!! $page->present()->url() !!}">{!! $page->present()->pageTitle() !!}</a>
            </li>
        @endforeach
    </ul>
@endsection