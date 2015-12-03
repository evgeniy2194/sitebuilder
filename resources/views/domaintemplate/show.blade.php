@extends('layouts.app')

@section('title') Template - {!! $domaintemplate->name !!} @endsection

@section('breadcrumbs')

    <ol class="breadcrumb">
        <li>
            <a href="/">Home</a>
        </li>
        <li>
            <a href="/domaintemplate">Templates</a>
        </li>
        <li class="active">{!! $domaintemplate->name !!}</li>
    </ol>

@endsection

@section('content')

    <div class="row">
        <div class="col-md-9"><h1>Template</h1></div>
        <div class="col-md-3 text-right" style="padding-top: 25px;">
            <a href="{{ url('/domaintemplate/'.$domaintemplate->id.'/edit') }}">
                <button type="submit" class="btn btn-warning">Edit</button>
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th class="text-center">Domains</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> {{ $domaintemplate->name }} </td>
                    <td class="text-center">{!! $domaintemplate->domains()->count() !!}</td>
                </tr>
            </tbody>    
        </table>
    </div>

    <h1>Domains</h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <th>Name</th>
                <th>Keyword Group</th>
                <th class="text-center">Pages</th>
                <th class="text-right">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($domaintemplate->domains as $item)
                <tr>
                    <td>{!! $item->present()->adminLink() !!}</td>
                    <td>{!! $item->keywordgroup->present()->adminLink() !!}</td>
                    <td class="text-center">{!! $item->pages()->count() !!}</td>
                    <td class="text-right">
                        <a href="{!! $item->present()->editURL() !!}">
                            <button type="submit" class="btn btn-primary btn-xs">Update</button></a>
                        /
                        {!! Form::open(['method'=>'delete','action'=>['DomainController@destroy',$item->id], 'style' => 'display:inline']) !!}
                        <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection