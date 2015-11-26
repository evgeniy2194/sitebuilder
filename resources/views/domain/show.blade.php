@extends('layouts.app')

@section('title') {!! $domain->name !!} @endsection

@section('content')

    <h1>Domain</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Domaingroup Id</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> {{ $domain->name }} </td><td> {{ $domain->domaingroup_id }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection