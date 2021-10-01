<?php

namespace App\Modules\AskCall\Providers;

use App\Modules\AskCall\Repository\AskCallReadRepository;
use App\Modules\AskCall\Repository\AskCallReadRepositoryInterFace;
use App\Modules\AskCall\Repository\AskCallWriteRepository;
use App\Modules\AskCall\Repository\AskCallWriteRepositoryInterface;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AskCallServiceProvider extends ServiceProvider
{
    protected $namespace = 'App\Modules\AskCall\Controllers';
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
        $this->app->bind(AskCallReadRepositoryInterFace::class, AskCallReadRepository::class);
        $this->app->bind(AskCallWriteRepositoryInterface::class, AskCallWriteRepository::class);
    }


    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/config.php', 'AskCall'
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