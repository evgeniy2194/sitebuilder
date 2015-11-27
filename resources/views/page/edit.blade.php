@extends('layouts.app')

@section('content')

    <h1>Edit Page</h1>
    <hr/>

    {!! Form::model($page, ['method' => 'PATCH', 'action' => ['PageController@update', $page->id], 'class' => 'form-horizontal']) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('body', 'Body: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
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