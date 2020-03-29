<?php

namespace Nesiasoft\Core\Descriptions;

use Illuminate\Support\ServiceProvider;

class DescriptionsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../../config/descriptions.php' => config_path('descriptions.php'),
            ], 'config');

            if (! class_exists('CreateDescriptionsTable')) {
                $this->publishes([
                    __DIR__.'/../../database/migrations/create_descriptions_table.php.stub' => database_path('migrations/'.date('Y_m_d_His', time()).'_create_descriptions_table.php'),
                ], 'migrations');
            }
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/descriptions.php', 'descriptions');
    }
}
