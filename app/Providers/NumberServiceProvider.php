<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class NumberServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $data = [];
        $data['0'] = '০';
        $data['1'] = '১';
        $data['2'] = '২';
        view()->share('number', $data);
        //then any view file we can access data with {{ $number['2'] }}

    }
}
