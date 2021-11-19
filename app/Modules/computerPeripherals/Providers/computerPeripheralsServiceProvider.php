<?php

namespace App\Modules\computerPeripherals\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use App\Modules\computerPeripherals\Repository\computerPeripheralsReedRepositoryInterface;
use App\Modules\computerPeripherals\Repository\computerPeripheralsReadRepository;
//use App\Modules\computerPeripherals\Repository\computerPeripheralsReedRepository;
class computerPeripheralsServiceProvider extends ServiceProvider
{
    protected $namespace = 'App\Modules\computerPeripherals\Controllers';
    protected $apiPrefix = '/api/v1';

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
        $this->app->bind(computerPeripheralsReedRepositoryInterface::class, computerPeripheralsReadRepository::class);
         //$this->app->bind(computerPeripheralsReedRepositoryInterface::class, computerPeripheralsReadRepository::class);
         //$this->app->bind(ComputerMonofakturaWriteRepositoryInterface::class,ComputerMonofakturaWriteRepository::class);
    }


    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/config.php', 'ComputerMonofaktura'
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
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(__DIR__ . '/../routes/route.php');
    }

}
