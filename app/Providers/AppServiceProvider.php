<?php

namespace App\Providers;

use App\Http\Repositories\Eloquent\UserRepositoryEloquent;
use App\Http\Repositories\UserRepositoryInterface;
use App\Http\Services\Impl\UserServiceImpl;
use App\Http\Services\UserServiceInterface;
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
        $this->app->singleton(UserRepositoryInterface::class, UserRepositoryEloquent::class);
        $this->app->singleton(UserServiceInterface::class, UserServiceImpl::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
