@extends('layouts.app')

@section('title') Edit Keyword Group @endsection

@section('breadcrumbs')

    <ol class="breadcrumb">
        <li>
            <a href="/">Home</a>
        </li>
        <li>
            <a href="/keywordgroup">Keyword Group</a>
        </li>
        <li>
            {!! $keywordgroup->present()->adminLink() !!}
        </li>
        <li class="active">Edit Keyword Group</li>
    </ol>

@endsection

@section('content')

    <h1>Edit Keyword Group</h1>
    <hr/>

    {!! Form::model($keywordgroup, ['method' => 'PATCH', 'action' => ['KeywordgroupController@update', $keywordgroup->id], 'class' => 'form-horizontal']) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('subreddits_filter', 'Subreddits: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('subreddits_filter', null, ['class' => 'form-control']) !!}
            <p class="help-block">Comma separated (Example: worldnews,politics,videos)</p>
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