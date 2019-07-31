<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class AddStockUrlProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
      View::composer('article.index', function ($view) {
        if (Auth::check()) {
          $urls = Auth::user()->stocks->pluck('url')->all();
          $view->with('urls' , $urls);
        };
      });
    }
}
