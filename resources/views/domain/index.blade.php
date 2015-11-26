@extends('layouts.app')

@section('title') Domains @endsection

@section('content')

    <h1>Domains <a href="{{ url('/domain/create') }}" class="btn btn-primary pull-right btn-sm">Add New Domain</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Domain Group</th>
                    <th>Actions</th>
                </tr>
            </thead>                
            <tbody>
            @foreach($domains as $item)
                <tr>
                    <td>
                        {!! $item->present()->adminLink() !!}
                    </td>
                    <td>
                        {!! $item->domaingroup->name !!}
                    </td>
                    <td>
                        <a href="{!! $item->present()->editURL() !!}">
                            <button type="submit" class="btn btn-primary btn-xs">Update</button>
                        </a>
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