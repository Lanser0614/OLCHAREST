<?php

namespace App\Modules\OlchaProducts\Providers;

use App\Modules\OlchaProducts\Repository\ProductReadRepository;
use App\Modules\OlchaProducts\Repository\ProductReadRepositoryInterface;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class OlchaProductServiceProvider extends ServiceProvider
{

    protected $namespace = 'App\Modules\OlchaProducts\Controllers';
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
        $this->app->bind(ProductReadRepositoryInterface::class, ProductReadRepository::class);
     //   $this->app->bind(BookReadRepositoryInterface::class, BookReadRepository::class);
    }


    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/config.php', 'OlchaProducts'
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