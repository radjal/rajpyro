<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//https://stackoverflow.com/questions/28402726/laravel-5-redirect-to-https
//use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    { 
        //https://stackoverflow.com/questions/28402726/laravel-5-redirect-to-https
       /*    if ( env('APP_ENV') === 'prod') { 
                $this->app['request']->server->set('HTTPS', true);
                URL::forceScheme('https');
            } */
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
