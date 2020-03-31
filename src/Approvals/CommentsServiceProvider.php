<?php

namespace Nesiasoft\Core\Approvals;

use Illuminate\Support\ServiceProvider;

class ApprovalsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../../config/approvals.php' => config_path('approvals.php'),
            ], 'config');

            if (! class_exists('CreateApprovalsTable')) {
                $this->publishes([
                    __DIR__.'/../../database/migrations/create_approvals_table.php.stub' => database_path('migrations/'.date('Y_m_d_His', time()).'_create_approvals_table.php'),
                ], 'migrations');
            }
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/approvals.php', 'approvals');
    }
}
