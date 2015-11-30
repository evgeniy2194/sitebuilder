@extends('layouts.app')

@section('title') {!! $domaingroup->name !!} @endsection

@section('breadcrumbs')

    <ol class="breadcrumb">
        <li>
            <a href="/">Home</a>
        </li>
        <li>
            <a href="/domaingroup">Domain Groups</a>
        </li>
        <li class="active">{!! $domaingroup->name !!}</li>
    </ol>

@endsection

@section('content')

    <div class="row">
        <div class="col-md-9">
            <h1>Domain Group</h1>
        </div>
        <div class="col-md-3 text-right" style="padding-top: 25px;">
            <a href="{!! $domaingroup->present()->editURL() !!}"><button type="submit" class="btn btn-warning">Edit</button></a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> {{ $domaingroup->name }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

    <h1>Domains <a href="{{ url('/domain/create'.'?domaingroup_id='.$domaingroup->id) }}" class="btn btn-primary pull-right btn-sm">Add Domains</a></h1>
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
            @foreach($domaingroup->domains as $item)
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