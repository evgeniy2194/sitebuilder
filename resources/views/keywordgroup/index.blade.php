@extends('layouts.app')

@section('title') Keyword Groups @endsection

@section('content')

    <h1>Keyword Groups <a href="{{ url('/keywordgroup/create') }}" class="btn btn-primary pull-right btn-sm">Add New Keyword Group</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th class="text-center">Keywords</th>
                    <th class="text-right">Actions</th>
                </tr>
            </thead>                
            <tbody>
            @foreach($keywordgroups as $item)
                <tr>
                    <td><a href="{{ url('/keywordgroup', $item->id) }}">{{ $item->name }}</a></td>
                    <td class="text-center">{!! $item->keywords()->count() !!}</td>
                    <td class="text-right">
                        <a href="{{ url('/keywordgroup/'.$item->id.'/edit') }}"><button type="submit" class="btn btn-primary btn-xs">Update</button></a>
                        /
                        {!! Form::open(['method'=>'delete','action'=>['KeywordgroupController@destroy',$item->id], 'style' => 'display:inline']) !!}<button type="submit" class="btn btn-danger btn-xs">Delete</button>{!! Form::close() !!}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection