<?php

namespace App\Modules\ComputerMonofaktura\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use App\Modules\ComputerMonofaktura\Repository\ComputerMonofakturaReadRepository;
use App\Modules\ComputerMonofaktura\Repository\ComputerMonofakturaWriteRepository;
use App\Modules\ComputerMonofaktura\Repository\ComputerMonofakturaReadRepositoryInterface;
use App\Modules\ComputerMonofaktura\Repository\ComputerMonofakturaWriteRepositoryInterface;

class ComputerMonofakturaServiceProvider extends ServiceProvider
{

    protected $namespace = 'App\Modules\ComputerMonofaktura\Controllers';
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
        $this->app->bind(ComputerMonofakturaReadRepositoryInterface::class, ComputerMonofakturaReadRepository::class);
        $this->app->bind(ComputerMonofakturaWriteRepositoryInterface::class,ComputerMonofakturaWriteRepository::class);
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