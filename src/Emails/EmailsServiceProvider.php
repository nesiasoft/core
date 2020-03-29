<?php

namespace Nesiasoft\Core\Emails;

use Illuminate\Support\ServiceProvider;

class EmailsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../../config/emails.php' => config_path('emails.php'),
            ], 'config');

            if (! class_exists('CreateEmailsTable')) {
                $this->publishes([
                    __DIR__.'/../../database/migrations/create_emails_table.php.stub' => database_path('migrations/'.date('Y_m_d_His', time()).'_create_emails_table.php'),
                ], 'migrations');
            }
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/emails.php', 'emails');
    }
}
