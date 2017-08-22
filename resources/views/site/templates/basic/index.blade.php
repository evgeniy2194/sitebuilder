@extends('site.templates.basic.layout')

@section('title') Home - {!! $domain->name !!} @endsection

@section('page-header')
    <h1>Hello! Welcome to {!! $domain->name !!}!</h1>
@endsection

@section('sidebar')
    @include('site.templates.basic.partials.sidebar-menu')
@endsection

@section('content')
    <hr>
    @foreach($recent_posts as $page)
        @include('site.templates.basic.partials.page-summary')
    @endforeach

    <div class="text-center">{!! $recent_posts->render() !!}</div>

@endsection