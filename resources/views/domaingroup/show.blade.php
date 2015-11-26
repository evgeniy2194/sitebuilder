@extends('layouts.app')

@section('title') {!! $domaingroup->name !!} @endsection

@section('content')

    <div class="row">
        <div class="col-md-9">
            <h1>Domain Group</h1>
        </div>
        <div class="col-md-3 text-right" style="padding-top: 25px;">
            <a href="{{ url('/domaingroup/'.$domaingroup->id.'/edit') }}"><button type="submit" class="btn btn-warning">Edit</button></a>
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

@endsection