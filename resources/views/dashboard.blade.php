@extends('layouts.app')

@section('title') Dashboard @endsection

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
            				</tbody>
            			</table>
            	  </div>
            </div>
		</div>
	</div>
@endsection