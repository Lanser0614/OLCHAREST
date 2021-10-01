<?php

namespace App\Modules\ProductForComputer\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use App\Modules\ProductForComputer\Repository\ProductForComputerWriteRepository;
use App\Modules\ProductForComputer\Repository\ProductForComputerRepositoryInterface;
use App\Modules\ProductForComputer\Repository\ProductForComputerRepositoryRepository;
use App\Modules\ProductForComputer\Repository\ProductForComputerWriteRepositoryInterface;

class ProductForComputerServiceProvider extends ServiceProvider
{
    protected $namespace = 'App\Modules\ProductForComputer\Controllers';
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
        $this->app->bind(ProductForComputerRepositoryInterface::class, ProductForComputerRepositoryRepository::class);
        $this->app->bind(ProductForComputerWriteRepositoryInterface::class, ProductForComputerWriteRepository::class);
    }


    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/config.php', 'ProductForComputer'
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