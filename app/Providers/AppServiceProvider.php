<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('level', function ($level) {
            if ($level == 'admin') {
                return Auth::check() && Auth::user()->level == 0;
            } elseif ($level == 'pelelang') {
                return Auth::check() && Auth::user()->level == 1;
            } elseif ($level == 'penawar') {
                return Auth::check() && Auth::user()->level == 2;
            }
        });
    }
}
