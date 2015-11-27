@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1>Pages</h1>
            <p class="alert alert-warning">This view is depreciated. Please view pages through their respective {!! link_to('/domaingroup', 'Domain Groups') !!}</p>
        </div>
    </div>

@endsection