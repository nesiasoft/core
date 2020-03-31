<?php

namespace Nesiasoft\Core\Bookmarks;

use Illuminate\Support\ServiceProvider;

class BookmarksServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../../config/bookmarks.php' => config_path('bookmarks.php'),
            ], 'config');

            if (! class_exists('CreateBookmarksTable')) {
                $this->publishes([
                    __DIR__.'/../../database/migrations/create_bookmarks_table.php.stub' => database_path('migrations/'.date('Y_m_d_His', time()).'_create_bookmarks_table.php'),
                ], 'migrations');
            }
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/bookmarks.php', 'bookmarks');
    }
}
