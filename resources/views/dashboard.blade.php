@extends('layouts.app')

@section('title') Dashboard @endsection

@section('breadcrumbs')

    <ol class="breadcrumb">
        <li class="active">Home</li>
    </ol>

@endsection

@section('content')
	<div class="row">
		<div class="col-md-4">
            <div class="panel panel-default">
            	  <div class="panel-heading">
            			<h3 class="panel-title">Overview</h3>
            	  </div>
            	  <div class="panel-body">
            			<table class="table table-condensed">
            				<tbody>
            					<tr>
            						<td><strong>Keyword Groups</strong></td>
            						<td class="text-right">{!! number_format(\App\Keywordgroup::count()) !!}</td>
            					</tr>
                                <tr>
                                    <td><strong>Keywords</strong></td>
                                    <td class="text-right">{!! number_format(\App\Keyword::count()) !!}</td>
                                </tr>
                                <tr>
                                    <td><strong>Domain Groups</strong></td>
                                    <td class="text-right">{!! number_format(\App\Domaingroup::count()) !!}</td>
                                </tr>
                                <tr>
                                    <td><strong>Domains</strong></td>
                                    <td class="text-right">{!! number_format(\App\Domain::count()) !!}</td>
                                </tr>
                                <tr>
                                    <td><strong>Pages</strong></td>
                                    <td class="text-right">{!! number_format(\App\Page::count()) !!}</td>
                                </tr>
                                <tr>
                                    <td><strong>Templates</strong></td>
                                    <td class="text-right">{!! number_format(\App\Domaintemplate::count()) !!}</td>
                                </tr>
            				</tbody>
            			</table>
            	  </div>
            </div>
		</div>
        <div class="col-md-8">

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Newest Domains</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-condensed">
                                <thead>
                                <tr>
                                    <th>Domain</th>
                                    <th class="text-right">Built</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(\App\Domain::orderBy('id', 'DESC')->take(10)->get() as $domain)
                                    <tr>
                                        <td>{!! $domain->present()->adminLink() !!}</td>
                                        <td class="text-right">{!! $domain->created_at->diffForHumans() !!}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Newest Pages</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-condensed">
                                <thead>
                                <tr>
                                    <th>Page</th>
                                    <th>Domain</th>
                                    <th class="text-right">Built</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(\App\Page::orderBy('id', 'DESC')->active()->take(10)->get() as $page)
                                    <tr>
                                        <td>{!! $page->present()->adminLink() !!}</td>
                                        <td>{!! $page->domain->present()->adminLink() !!}</td>
                                        <td class="text-right">{!! $page->created_at->diffForHumans() !!}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
	</div>
@endsection