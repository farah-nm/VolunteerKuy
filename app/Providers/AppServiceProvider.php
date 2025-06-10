<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;


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
        if (config('app.debug')) {
        DB::listen(function ($query) {
            logger("Query: " . $query->sql);
            logger("Bindings: " . json_encode($query->bindings));
            logger("Time: " . $query->time);
        });
    }
    }
}
