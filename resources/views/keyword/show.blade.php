@extends('layouts.app')

@section('title') {!! $keyword->name !!} @endsection

@section('content')

    <h1>Keyword</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Name</th><th>Keywordgroup Id</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $keyword->id }}</td> <td> {{ $keyword->name }} </td><td> {{ $keyword->keywordgroup_id }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection