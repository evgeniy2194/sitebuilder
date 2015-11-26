@extends('layouts.app')

@section('title') Keywords @endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1>Keywords</h1>
            <p class="alert alert-warning">This view is depreciated. Please view keywords through their respective {!! link_to('/keywordgroup', 'Keyword Groups') !!}</p>
        </div>
    </div>

@endsection