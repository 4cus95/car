<?php

namespace App\Providers;

use App\Http\Controllers\CarsController;
use App\Repositories\CarRepository;
use App\Repositories\Interfaces\CarRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->when(CarsController::class)
            ->needs(CarRepositoryInterface::class)
            ->give(CarRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
