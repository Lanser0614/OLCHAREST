<?php

namespace App\Modules\OlchaCategories\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use App\Modules\OlchaCategories\Repository\OlchaCategoriesReadRepository;
use App\Modules\OlchaCategories\Repository\OlchaCategoriesReadRepositoryInterface;

class OlchaCategoriesServiceProvider extends ServiceProvider
{
    protected $namespace = 'App\Modules\OlchaCategories\Controllers';
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
           $this->app->bind(OlchaCategoriesReadRepositoryInterface::class, OlchaCategoriesReadRepository::class);
        // $this->app->bind(ComputerWriteRepositoryInterface::class, ComputerWriteRepository::class);
    }


    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/config.php', 'OlchaCategories'
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
