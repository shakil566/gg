<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CustomServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind('jogfol', function($app){
            dd('sdds');
            // return new \App\Repositories\Jogfol;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
