<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Added to avoid the max key length error in older versions of MySql
        Schema::defaultStringLength(191);

        view()->composer('layouts.sidebar', function($view) {
            $view->with('offersCount', \App\Offer::count())
                ->with('companiesCount', \App\Company::count());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
