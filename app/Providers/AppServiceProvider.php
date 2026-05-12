<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Sembunyikan pesan Deprecated agar tidak merusak tampilan di PHP 8.5
        error_reporting(E_ALL & ~E_DEPRECATED);
    }
}
