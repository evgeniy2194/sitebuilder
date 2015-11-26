@extends('layouts.app')

@section('title') Add Domains @endsection

@section('content')

    <h1>Add Domains</h1>
    <hr/>

    {!! Form::open(['url' => 'domain', 'class' => 'form-horizontal']) !!}
    
    <div class="form-group">
        {!! Form::label('domains', 'Domain: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::textarea('domains', null, ['class' => 'form-control']) !!}
            <p class="help-block">One domain per line</p>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::hidden('domaingroup_id', app('request')->input('domaingroup_id')) !!}
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