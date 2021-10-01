<?php

namespace App\Modules\ComputerForProgram\Providers;

use App\Modules\ComputerForProgram\Repository\ComputerForProgramReadRepository;
use App\Modules\ComputerForProgram\Repository\ComputerForProgramReadRepositoryInterface;
use App\Modules\ComputerForProgram\Repository\ComputerForProgramWriteRepository;
use App\Modules\ComputerForProgram\Repository\ComputerForProgramWriteRepositoryInterface;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class ComputerForProgramServiceProvider extends ServiceProvider
{
    protected $namespace = 'App\Modules\ComputerForProgram\Controllers';
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
        $this->app->bind(ComputerForProgramReadRepositoryInterface::class, ComputerForProgramReadRepository::class);
        $this->app->bind(ComputerForProgramWriteRepositoryInterface::class, ComputerForProgramWriteRepository::class);
    }


    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/config.php', 'ComputerForProgram'
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