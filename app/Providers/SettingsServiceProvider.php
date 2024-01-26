<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Setting;

class SettingsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Share settings with all views
        view()->composer('*', function ($view) {
            $view->with('settings', new Setting());
        });

        // Or, bind settings to the service container
        // $this->app->singleton('settings', function ($app) {
        //     return new Setting();
        // });
    }
}
