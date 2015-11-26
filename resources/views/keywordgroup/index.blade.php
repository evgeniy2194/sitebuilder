@extends('layouts.app')

@section('title') Keyword Groups @endsection

@section('content')

    <h1>Keyword Groups <a href="{{ url('/keywordgroup/create') }}" class="btn btn-primary pull-right btn-sm">Add New Keyword Group</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>                
            <tbody>
            @foreach($keywordgroups as $item)
                <tr>
                    <td class="text-center">{{ $item->id }}</td>
                    <td><a href="{{ url('/keywordgroup', $item->id) }}">{{ $item->name }}</a></td>
                    <td>
                        <a href="{{ url('/keywordgroup/'.$item->id.'/edit') }}"><button type="submit" class="btn btn-primary btn-xs">Update</button></a>
                        /
                        {!! Form::open(['method'=>'delete','action'=>['KeywordgroupController@destroy',$item->id], 'style' => 'display:inline']) !!}<button type="submit" class="btn btn-danger btn-xs">Delete</button>{!! Form::close() !!}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection