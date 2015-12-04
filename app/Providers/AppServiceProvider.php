<?php

namespace App\Providers;

use App\Page;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /*
         * Custom Validation Rules
         */

        \Validator::extend('domain_name', function($attribute, $value, $parameters, $validator)
        {
            return filter_var('http://'.$value, FILTER_VALIDATE_URL);
        });

        /*
         * Model Events
         */

        Page::created(function(Page $page)
        {
            // Send request to content API
            $page->requestContent();
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if($this->app->environment('local'))
        {
            // Register dev-only (local) service providers here
            $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }
}
