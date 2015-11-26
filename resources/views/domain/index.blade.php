@extends('layouts.app')

@section('title') Domains @endsection

@section('content')

    <h1>Domains <a href="{{ url('/domain/create') }}" class="btn btn-primary pull-right btn-sm">Add New Domain</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>SL.</th><th>Name</th><th>Domaingroup Id</th><th>Actions</th>
                </tr>
            </thead>                
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($domains as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('/domain', $item->id) }}">{{ $item->name }}</a></td><td>{{ $item->domaingroup_id }}</td>
                    <td><a href="{{ url('/domain/'.$item->id.'/edit') }}"><button type="submit" class="btn btn-primary btn-xs">Update</button></a> / {!! Form::open(['method'=>'delete','action'=>['DomainController@destroy',$item->id], 'style' => 'display:inline']) !!}<button type="submit" class="btn btn-danger btn-xs">Delete</button>{!! Form::close() !!}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection