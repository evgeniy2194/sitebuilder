@extends('layouts.app')

@section('title') Add Keywords @endsection

@section('breadcrumbs')

    <ol class="breadcrumb">
        <li>
            <a href="/">Home</a>
        </li>
        <li>
            <a href="/keyword">Keywords</a>
        </li>
        <li class="active">Add Keywords</li>
    </ol>

@endsection

@section('content')

    <h1>Add Keywords</h1>
    <hr/>

    {!! Form::open(['url' => 'keyword', 'class' => 'form-horizontal']) !!}
    
    <div class="form-group">
        {!! Form::label('keywords', 'Keywords: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::textarea('keywords', null, ['class' => 'form-control']) !!}
            <p class="help-block">One keyword per line</p>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::hidden('keywordgroup_id', app('request')->input('keywordgroup_id')) !!}
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