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
        config([
            'sample.data'=>['こんにちは', 'どうも', 'さようなら']
        ]);

        app()->bind(
            'App\MyClasses\MyService',
            function ($app) {
                $myservice = new MyService();
                $myservice->setId(0); // デフォ
                return $myservice;
            }
        );
    }
}
