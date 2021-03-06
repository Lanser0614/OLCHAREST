<?php

namespace App\Modules\CategoryForComputer\Providers;

use App\Modules\CategoryForComputer\Repository\CategoryForComputerRepository;
use App\Modules\CategoryForComputer\Repository\CategoryForComputerRepositoryInterface;
use App\Modules\CategoryForComputer\Repository\CategoryForComputerWriteRepository;
use App\Modules\CategoryForComputer\Repository\CategoryForComputerWriteRepositoryInterface;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class CategoryForComputerServiceProvider extends ServiceProvider
{

    protected $namespace = 'App\Modules\CategoryForComputer\Controllers';
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
          $this->app->bind(CategoryForComputerRepositoryInterface::class, CategoryForComputerRepository::class);
          $this->app->bind(CategoryForComputerWriteRepositoryInterface::class, CategoryForComputerWriteRepository::class);
    }


    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/config.php', 'CategoryForComputer'
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