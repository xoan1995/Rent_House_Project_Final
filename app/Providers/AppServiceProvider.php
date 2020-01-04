<?php

namespace App\Providers;

use App\City;
use App\District;
use App\House;
use App\Http\Repositories\Eloquent\HomeRepository;
use App\Http\Repositories\Eloquent\HouseRepository;
use App\Http\Repositories\Eloquent\UserRepository;
use App\Http\Repositories\HomeRepositoryInterface;
use App\Http\Repositories\HouseRepositoryInterface;
use App\Http\Repositories\UserRepositoryInterface;
use App\Http\services\BaseServiceInterface;
use App\Http\services\HomeServiceInterface;
use App\Http\services\HouseServiceInterface;
use App\Http\services\Implement\HomeService;
use App\Http\services\Implement\HouseService;
use App\Http\services\Implement\UserService;
use App\Http\services\UserServiceInterface;
use App\Notification;
use Illuminate\Support\Facades\Auth;
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

        $this->app->singleton(UserServiceInterface::class, UserService::class);
        $this->app->singleton(UserRepositoryInterface::class, UserRepository::class);

        $this->app->singleton(HouseServiceInterface::class, HouseService::class);
        $this->app->singleton(HouseRepositoryInterface::class, HouseRepository::class);

    }
}
