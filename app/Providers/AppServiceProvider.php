<?php

namespace App\Providers;

use App\MyClasses\MyService;

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
    app()->when('App\MyClasses\MyService')
          ->needs('$id')
          ->give(1);
}


}
