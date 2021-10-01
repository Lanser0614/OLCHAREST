<?php

namespace App\Modules\RelatedProduct\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use App\Modules\RelatedProduct\Repository\RelatedProductRepository;
use App\Modules\RelatedProduct\Repository\RelatedProductWriteRepository;
use App\Modules\RelatedProduct\Repository\RelatedProductRepositoryInterface;
use App\Modules\RelatedProduct\Repository\RelatedProductWriteRepositoryInterFace;

class RelatedProductServiceProvider extends ServiceProvider
{
    protected $namespace = 'App\Modules\RelatedProduct\Controllers';
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
        $this->app->bind(RelatedProductRepositoryInterface::class, RelatedProductRepository::class);
        $this->app->bind(RelatedProductWriteRepositoryInterFace::class, RelatedProductWriteRepository::class);
    }


    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/config.php', 'RelatedProduct'
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