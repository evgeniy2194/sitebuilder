@extends('layouts.app')

@section('title') {!! $keywordgroup->name !!} @endsection

@section('breadcrumbs')

    <ol class="breadcrumb">
        <li>
            <a href="/">Home</a>
        </li>
        <li>
            <a href="/keywordgroup">Keyword Groups</a>
        </li>
        <li class="active">{!! $keywordgroup->name !!}</li>
    </ol>

@endsection

@section('content')

    <div class="row">
        <div class="col-md-9">
            <h1>Keyword Group</h1>
        </div>
        <div class="col-md-3 text-right" style="padding-top: 25px;">
            <a href="{!! $keywordgroup->present()->editURL() !!}"><button type="submit" class="btn btn-warning">Edit</button></a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Subreddit Filters</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $keywordgroup->name }} </td>
                    <td>
                        @if($keywordgroup->subreddits_filter !== null)
                            @foreach(explode(',', $keywordgroup->subreddits_filter) as $subreddit)
                                <a href="https://reddit.com/r/{!! $subreddit !!}" target="_blank">r/{!! $subreddit !!}</a><br>
                            @endforeach
                        @else
                            N/A
                        @endif
                    </td>
                </tr>
            </tbody>    
        </table>
    </div>

    <h1>Keywords <a href="{{ url('/keyword/create'.'?keywordgroup_id='.$keywordgroup->id) }}" class="btn btn-primary pull-right btn-sm">Add Keywords</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <th>Name</th>
                <th class="text-center">Pages</th>
                <th class="text-right">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($keywordgroup->keywords as $item)
                <tr>
                    <td>{!! $item->present()->adminLink() !!}</td>
                    <td class="text-center">{!! $item->pages()->count() !!}</td>
                    <td class="text-right">
                        <a href="{!! $item->present()->editURL() !!}">
                            <button type="submit" class="btn btn-primary btn-xs">Update</button></a>
                        /
                        {!! Form::open(['method'=>'delete','action'=>['KeywordController@destroy',$item->id], 'style' => 'display:inline']) !!}
                            <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection