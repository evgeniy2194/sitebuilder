@extends('layouts.app')

@section('title') Templates @endsection

@section('breadcrumbs')

    <ol class="breadcrumb">
        <li>
            <a href="/">Home</a>
        </li>
        <li class="active">Templates</li>
    </ol>

@endsection

@section('content')

    <h1>Templates <a href="{{ url('/domaintemplate/create') }}" class="btn btn-primary pull-right btn-sm">Add New Template</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th class="text-center">Domains</th>
                    <th class="text-right">Actions</th>
                </tr>
            </thead>                
            <tbody>
            @foreach($domaintemplates as $item)
                <tr>
                    <td><a href="{{ url('/domaintemplate', $item->id) }}">{{ $item->name }}</a></td>
                    <td class="text-center">{!! $item->domains()->count() !!}</td>
                    <td class="text-right">
                        <a href="{{ url('/domaintemplate/'.$item->id.'/edit') }}">
                            <button type="submit" class="btn btn-warning btn-xs">Edit</button>
                        </a>
                        /
                        {!! Form::open(['method'=>'delete','action'=>['DomaintemplateController@destroy',$item->id], 'style' => 'display:inline']) !!}
                            <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection