<?php

namespace GitScrum\Console;

use GitScrum\Console\Services\HttpClient;
use \Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

class ServiceProvider extends IlluminateServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/gitscrum.php' => config_path('gitscrum.php'),
        ]);
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Commands\Signin::class,
                Commands\Logout::class,
                Commands\MyNextTasks::class,
                Commands\Task::class,
                Commands\Menu::class,
            ]);
        }

        $this->app->singleton(HttpClient::class);

        $this->mergeConfigFrom(__DIR__ . '/../config/gitscrum.php', 'gitscrum.php');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            Commands\CheckRoutes::class,
        ];
    }
}
