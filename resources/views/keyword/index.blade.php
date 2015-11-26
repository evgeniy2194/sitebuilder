@extends('layouts.app')

@section('title') Keywords @endsection

@section('content')

    <h1>Keywords <a href="{{ url('/keyword/create') }}" class="btn btn-primary pull-right btn-sm">Add New Keyword</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>SL.</th><th>Name</th><th>Keywordgroup Id</th><th>Actions</th>
                </tr>
            </thead>                
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($keywords as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('/keyword', $item->id) }}">{{ $item->name }}</a></td><td>{{ $item->keywordgroup_id }}</td>
                    <td><a href="{{ url('/keyword/'.$item->id.'/edit') }}"><button type="submit" class="btn btn-primary btn-xs">Update</button></a> / {!! Form::open(['method'=>'delete','action'=>['KeywordController@destroy',$item->id], 'style' => 'display:inline']) !!}<button type="submit" class="btn btn-danger btn-xs">Delete</button>{!! Form::close() !!}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection