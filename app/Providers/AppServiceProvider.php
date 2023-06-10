<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //we can create a service and use it anywhere in our project
        app()->bind('First_Service', function($app){
            echo 'first service example';
        });

        // for access in anywhere app()->make('First_Service');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
