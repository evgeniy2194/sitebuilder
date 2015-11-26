@extends('layouts.app')

@section('title') Edit Domain Group @endsection

@section('breadcrumbs')

    <ol class="breadcrumb">
        <li>
            <a href="/">Home</a>
        </li>
        <li>
            <a href="/domaingroup">Domain Group</a>
        </li>
        <li>
            {!! $domaingroup->present()->adminURL() !!}
        </li>
        <li class="active">Edit Domain Group</li>
    </ol>

@endsection

@section('content')

    <h1>Edit Domain Group</h1>
    <hr/>

    {!! Form::model($domaingroup, ['method' => 'PATCH', 'action' => ['DomaingroupController@update', $domaingroup->id], 'class' => 'form-horizontal']) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
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