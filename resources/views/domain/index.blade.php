@extends('layouts.app')

@section('title') Domains @endsection

@section('breadcrumbs')

    <ol class="breadcrumb">
        <li>
            <a href="/">Home</a>
        </li>
        <li>
            <a href="/domaingroup">Domain Groups</a>
        </li>
        <li class="active">Domains</li>
    </ol>

@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1>Domains</h1>
            <p class="alert alert-warning">This view is depreciated. Please view domains through their respective {!! link_to('/domaingroup', 'Domain Groups') !!}</p>
        </div>
    </div>

@endsection