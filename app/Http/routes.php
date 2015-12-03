<?php

$domain = null;
if (strpos(php_sapi_name(), 'fpm-fcgi') !== false)
{
    $domain = \App\Domain::getDomainFromRequest();
}

if($domain !== null)
{
    Route::get('/',                                 'SiteController@index');
    Route::get('/{slug}',                           'SiteController@page');
}
else
{
    Route::group(['middleware' => 'auth'], function() {

        Route::get('/', function () {
            return view('dashboard');
        });

        Route::resource('keywordgroup',             'KeywordgroupController');
        Route::resource('keyword',                  'KeywordController');
        Route::resource('domaingroup',              'DomaingroupController');
        Route::resource('domaintemplate',           'DomaintemplateController');
        Route::resource('domain',                   'DomainController');
        Route::resource('page',                     'PageController');

    });

    Route::post('webhooks/content/page/{id}',   'WebhooksController@receiveContent');
}
