<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      if (\App::environment('production')) {
        \URL::forceScheme('https');
      }
      Schema::defaultStringLength(191);
      Blade::component('components.header', 'header');
      Blade::component('components.sub_header', 'sub_header');
    }
}
