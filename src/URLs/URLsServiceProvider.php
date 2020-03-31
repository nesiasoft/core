<?php

namespace Nesiasoft\Core\URLs;

use Illuminate\Support\ServiceProvider;

class URLsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../../config/urls.php' => config_path('urls.php'),
            ], 'config');

            if (! class_exists('CreateURLsTable')) {
                $this->publishes([
                    __DIR__.'/../../database/migrations/create_urls_table.php.stub' => database_path('migrations/'.date('Y_m_d_His', time()).'_create_urls_table.php'),
                ], 'migrations');
            }
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/urls.php', 'urls');
    }
}
