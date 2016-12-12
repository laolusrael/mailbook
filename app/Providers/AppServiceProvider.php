<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind("App\\MB\\Interfaces\\ISqliteDb", "App\\MB\\Services\\SqliteDb");
        $this->app->bind("App\\MB\\Interfaces\\IContactService", "App\\MB\\Services\\ContactService");

    }
}
