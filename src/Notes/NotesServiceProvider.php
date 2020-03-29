<?php

namespace Nesiasoft\Core\Notes;

use Illuminate\Support\ServiceProvider;

class NotesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../../config/notes.php' => config_path('notes.php'),
            ], 'config');

            if (! class_exists('CreateNotesTable')) {
                $this->publishes([
                    __DIR__.'/../../database/migrations/create_notes_table.php.stub' => database_path('migrations/'.date('Y_m_d_His', time()).'_create_notes_table.php'),
                ], 'migrations');
            }
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/notes.php', 'notes');
    }
}
