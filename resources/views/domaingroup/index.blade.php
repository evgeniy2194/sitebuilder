@extends('layouts.app')

@section('title') Domain Groups @endsection

@section('content')

    <h1>Domain Groups <a href="{{ url('/domaingroup/create') }}" class="btn btn-primary pull-right btn-sm">Add Domain Group</a></h1>
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
            @foreach($domaingroups as $item)
                <tr>
                    <td>
                        {!! $item->present()->adminLink() !!}
                    </td>
                    <td class="text-center">{!! number_format($item->domains()->count()) !!}</td>
                    <td class="text-right">
                        <a href="{!! $item->present()->editURL() !!}">
                            <button type="submit" class="btn btn-primary btn-xs">Update</button>
                        </a>
                        /
                        {!! Form::open(['method'=>'delete','action'=>['DomaingroupController@destroy',$item->id], 'style' => 'display:inline']) !!}
                        <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection