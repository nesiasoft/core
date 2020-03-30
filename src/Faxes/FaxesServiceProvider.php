<?php

namespace Nesiasoft\Core\Faxes;

use Illuminate\Support\ServiceProvider;

class FaxesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../../config/faxes.php' => config_path('faxes.php'),
            ], 'config');

            if (! class_exists('CreateFaxesTable')) {
                $this->publishes([
                    __DIR__.'/../../database/migrations/create_faxes_table.php.stub' => database_path('migrations/'.date('Y_m_d_His', time()).'_create_faxes_table.php'),
                ], 'migrations');
            }
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/faxes.php', 'faxes');
    }
}
