<?php

namespace App\Modules\FeedbackComputer\Providers;

use App\Modules\FeedbackComputer\Repository\FeedbackReadRepository;
use App\Modules\FeedbackComputer\Repository\FeedbackRepositoryReadInterface;
use App\Modules\FeedbackComputer\Repository\FeedbackWriteRepository;
use App\Modules\FeedbackComputer\Repository\FeedbackWriteRepositoryInterface;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class FeedbackServiceProvider extends ServiceProvider
{

    protected $namespace = 'App\Modules\FeedbackComputer\Controllers';
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
        $this->app->bind(FeedbackRepositoryReadInterface::class, FeedbackReadRepository::class);
        $this->app->bind(FeedbackWriteRepositoryInterface::class, FeedbackWriteRepository::class);
    }


    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/config.php', 'FeedbackComputer'
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