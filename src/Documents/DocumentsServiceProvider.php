<?php

namespace Nesiasoft\Core\Documents;

use Illuminate\Support\ServiceProvider;

class DocumentsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../../config/documents.php' => config_path('documents.php'),
            ], 'config');

            if (! class_exists('CreateDocumentsTable')) {
                $this->publishes([
                    __DIR__.'/../../database/migrations/create_documents_table.php.stub' => database_path('migrations/'.date('Y_m_d_His', time()).'_create_documents_table.php'),
                ], 'migrations');
            }
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/documents.php', 'documents');
    }
}
