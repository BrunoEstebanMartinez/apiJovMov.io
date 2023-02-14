<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('logon');
        View::share('password');
        View::share('cve_usuario');
        View::share('cve_arbol');
        View::share('status_1');
        View::share('catAllCveAndDescModel');

    }
}
