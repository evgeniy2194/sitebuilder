<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => 'auth'], function() {

    Route::get('/', function () {
        return view('dashboard');
    });
    
    Route::resource('keywordgroup',             'KeywordgroupController');
    Route::resource('keyword',                  'KeywordController');
    Route::resource('domaingroup',              'DomaingroupController');
    Route::resource('domain',                   'DomainController');
    Route::resource('page',                     'PageController');
});

Route::post('webhooks/content/page/{id}',   'WebhooksController@receiveContent');