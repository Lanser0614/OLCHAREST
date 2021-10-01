<?php

namespace App\Modules\EmailFeedback\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use App\Modules\EmailFeedback\Repository\EmailFeedbackReadRepository;
use App\Modules\EmailFeedback\Repository\EmailFeedbackWriteRepository;
use App\Modules\EmailFeedback\Repository\EmailFeedbackReadRepositoryInterface;
use App\Modules\EmailFeedback\Repository\EmailFeedbackWriteRepositoryInterface;

class EmailFeedbackServiceProvider extends ServiceProvider
{
    protected $namespace = 'App\Modules\EmailFeedback\Controllers';
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
          $this->app->bind(EmailFeedbackReadRepositoryInterface::class, EmailFeedbackReadRepository::class);
          $this->app->bind(EmailFeedbackWriteRepositoryInterface::class, EmailFeedbackWriteRepository::class);
    }


    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/config.php', 'Computers'
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