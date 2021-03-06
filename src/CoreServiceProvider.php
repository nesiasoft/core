<?php

namespace Nesiasoft\Core;

use Illuminate\Support\ServiceProvider;
use Nesiasoft\Core\Console\Commands\PublishCoreFiles;

class CoreServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                PublishCoreFiles::class,
            ]);

            $this->publishes([
                __DIR__.'/../config/core.php' => config_path('core.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/core.php', 'core');

        $this->app->singleton('core', function () {
            return new Core;
        });
    }
}
