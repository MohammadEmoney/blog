<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
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
        // $backgroundImage = 'front/assets/img/home-bg-2.jpg';
        View::share('backgroundImage', 'front/assets/img/home-bg-2.jpg');
    }
}
