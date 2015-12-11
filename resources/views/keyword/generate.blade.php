@extends('layouts.app')

@section('title') Edit Keyword @endsection

@section('breadcrumbs')

    <ol class="breadcrumb">
        <li>
            <a href="/">Home</a>
        </li>
        <li class="active">Generate Keywords</li>
    </ol>

@endsection

@section('content')

    <h1>Generate Keyword List</h1>
    <hr/>

    {!! Form::open(['method' => 'POST', 'class' => '']) !!}

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                {!! Form::label('before', 'Prefixes: ', ['class' => 'control-label']) !!}
                {!! Form::textarea('before', isset($before) ? implode("\r\n", $before) : null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                {!! Form::label('root', 'Root Words: ', ['class' => 'control-label']) !!}
                {!! Form::textarea('root', isset($root) ? implode("\r\n", $root) : null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                {!! Form::label('after', 'Suffixes: ', ['class' => 'control-label']) !!}
                {!! Form::textarea('after', isset($after) ? implode("\r\n", $after) : null, ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-3 col-sm-offset-9 text-right">
            {!! Form::submit('Generate', ['class' => 'btn btn-primary form-control']) !!}
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

    @if(isset($generated))
        <div class="row">
            <div class="col-md-12">

                <hr>

                <div class="panel panel-default">
                	  <div class="panel-heading">
                			<h3 class="panel-title">Keyword List</h3>
                	  </div>
                	  <div class="panel-body">
                          <div class="row">
                              <div class="col-md-3">Keywords: {{ number_format(count($generated)) }}<br><br></div>
                          </div>

                          @foreach($generated as $kw)
                              {{ $kw }} <br>
                          @endforeach
                	  </div>
                </div>
            </div>
        </div>
    @endif

@endsection