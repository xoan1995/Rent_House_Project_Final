<?php

namespace App\Providers;

use App\City;
use App\District;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

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
        $cities = City::all();
        $districts = District::all();
        \Illuminate\Support\Facades\View::share('cities', $cities);
        \Illuminate\Support\Facades\View::share('districts', $districts);
    }
}
