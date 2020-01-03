<?php

namespace App\Providers;

use App\City;
use App\District;
use App\Http\Repositories\Eloquent\HomeRepository;
use App\Http\Repositories\HomeRepositoryInterface;
use App\Http\services\BaseServiceInterface;
use App\Http\services\HomeServiceInterface;
use App\Http\services\Implement\HomeService;
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

        $this->app->singleton(HomeServiceInterface::class, HomeService::class);
        $this->app->singleton(HomeRepositoryInterface::class, HomeRepository::class);

    }
}
