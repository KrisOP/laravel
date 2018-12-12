<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(150);//permitir un valor de 150 en todos los strings
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
