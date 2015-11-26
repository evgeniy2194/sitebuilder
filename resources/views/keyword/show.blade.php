@extends('layouts.app')

@section('title') {!! $keyword->name !!} @endsection

@section('content')

    <h1>Keyword</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Keyword Group</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> {{ $keyword->name }} </td>
                    <td> {!! $keyword->keywordgroup->present()->adminLink() !!} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection