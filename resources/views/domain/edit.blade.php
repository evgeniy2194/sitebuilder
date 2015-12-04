@extends('layouts.app')

@section('title') Edit Domain @endsection

@section('breadcrumbs')

    <ol class="breadcrumb">
        <li>
            <a href="/">Home</a>
        </li>
        <li>
            <a href="/domain">Domains</a>
        </li>
        <li>
            {!! $domain->present()->adminURL() !!}
        </li>
        <li class="active">Edit Domain</li>
    </ol>

@endsection

@section('content')

    <h1>Edit Domain</h1>
    <hr/>

    {!! Form::model($domain, ['method' => 'PATCH', 'action' => ['DomainController@update', $domain->id], 'class' => 'form-horizontal']) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
            <p class="help-block">Don't change this unless you know what you're doing.</p>
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('domaintemplate_id', 'Template: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::select('domaintemplate_id', \App\Domaintemplate::lists('name','id'), $domain->domaintemplate_id, ['class' => 'form-control']) !!}
            <p class="help-block">Changing this will change the default template for new domains added, but has no effect on existing domains.</p>
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('keywordgroup_id', 'Keyword Group: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::select('keywordgroup_id', \App\Keywordgroup::lists('name','id'), $domain->keywordgroup_id, ['class' => 'form-control']) !!}
            <p class="help-block">Changing this will change the default keyword group for new domains added, but has no effect on existing domains.</p>
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