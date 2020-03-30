<?php

namespace Nesiasoft\Core\Phones;

use Illuminate\Support\ServiceProvider;

class PhonesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../../config/phones.php' => config_path('phones.php'),
            ], 'config');

            if (! class_exists('CreatePhonesTable')) {
                $this->publishes([
                    __DIR__.'/../../database/migrations/create_phones_table.php.stub' => database_path('migrations/'.date('Y_m_d_His', time()).'_create_phones_table.php'),
                ], 'migrations');
            }
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/phones.php', 'phones');
    }
}
