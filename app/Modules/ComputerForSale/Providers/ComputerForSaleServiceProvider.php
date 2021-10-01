<?php

namespace App\Modules\ComputerForSale\Providers;

use App\Modules\ComputerForSale\Repository\ComputerForSaleRepository;
use App\Modules\ComputerForSale\Repository\ComputerForSaleRepositoryInterface;
use App\Modules\ComputerForSale\Repository\ComputerForSaleWriteRepository;
use App\Modules\ComputerForSale\Repository\ComputerForSaleWriteRepositoryInterface;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class ComputerForSaleServiceProvider extends ServiceProvider
{
    protected $namespace = 'App\Modules\ComputerForSale\Controllers';
    protected $apiPrefix = '/api/v1/';

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;


    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerConfig();
        $this->routes();
        if ($this->app->runningInConsole()) {
            $this->registerMigrations();
        }
        $this->app->bind(ComputerForSaleRepositoryInterface::class, ComputerForSaleRepository::class);
        $this->app->bind(ComputerForSaleWriteRepositoryInterface::class, ComputerForSaleWriteRepository::class);
    }


    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/config.php', 'ComputerForSale'
        );
    }


    /**
     * Register Installment's migration files.
     *
     * @return void
     */
    protected function registerMigrations()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }


    public function routes()
    {
        Route::
        prefix($this->apiPrefix)
            ->namespace($this->namespace)
            ->middleware('api')
            ->group(__DIR__ . '/../routes/route.php');
    }
}