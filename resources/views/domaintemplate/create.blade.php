@extends('layouts.app')

@section('title') Create Domain Template @endsection

@section('breadcrumbs')

    <ol class="breadcrumb">
        <li>
            <a href="/">Home</a>
        </li>
        <li>
            <a href="/domaintemplate">Templates</a>
        </li>
        <li class="active">Create Template</li>
    </ol>

@endsection

@section('content')

    <h1>Create New Template</h1>
    <hr/>

    <p class="alert alert-info">Templates are stored in <strong>resources/views/site/templates/{template_name}</strong></p>
    <p><strong>The following three files make up a template</strong></p>
    <ul>
        <li>layout.blade.php - The layout file</li>
        <li>index.blade.php - The view shown on a domains index, extending layout.blade.php</li>
        <li>page.blade.php - The view shown on a content page, extending layout.blade.php</li>
    </ul>
    <p class="help-block">All three files are required</p>

    <br>

    {!! Form::open(['url' => 'domaintemplate', 'class' => 'form-horizontal']) !!}
    
    <div class="form-group">
        {!! Form::label('name', 'Name: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
            <p class="help-block">This value (case-insensitive) must be the same as the path folder (lowercase, slugged) it resides in.</p>
            <p class="help-block"><strong>Example:</strong> A template named Blue Shoes would be found in views/site/templates/blue-shoes</p>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
        </div>    
    </div>
    {!! Form::close() !!}

    <p class="alert alert-warning"><strong>There is currently no validation for this, if the path isn't correct or the files don't exist, the page will error.</strong></p>

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

@endsection