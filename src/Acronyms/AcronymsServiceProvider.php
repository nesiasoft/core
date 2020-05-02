<?php

namespace Nesiasoft\Core\Acronyms;

use Illuminate\Support\ServiceProvider;

class AcronymsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../../config/acronyms.php' => config_path('acronyms.php'),
            ], 'config');

            if (! class_exists('CreateAcronymsTable')) {
                $this->publishes([
                    __DIR__.'/../../database/migrations/create_acronyms_table.php.stub' => database_path('migrations/'.date('Y_m_d_His', time()).'_create_acronyms_table.php'),
                ], 'migrations');
            }
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/acronyms.php', 'acronyms');
    }
}
