@extends('layouts.app')

@section('title') Add Pages @endsection

@section('breadcrumbs')

    <ol class="breadcrumb">
        <li>
            <a href="/">Home</a>
        </li>
        <li>
            <a href="/page">Pages</a>
        </li>
        <li class="active">Add Pages</li>
    </ol>

@endsection

@section('content')

    <h1>Add Pages</h1>
    <hr/>

    {!! Form::open(['url' => 'page', 'class' => 'form-horizontal']) !!}
    
    <div class="form-group">
        {!! Form::label('count', 'Number of pages to create: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('count', null, ['class' => 'form-control']) !!}
            <p class="help-block">Up to {!! \App\Domain::find(app('request')->input('domain_id'))->keywordgroup->keywords()->count() !!} pages</p>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::hidden('domain_id', app('request')->input('domain_id')) !!}
            {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
        </div>    
    </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

@endsection