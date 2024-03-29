<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;

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
        Paginator::useBootstrap();
        $this->activeLinks();
    }

    public function activeLinks()
    {
        view()->composer('layouts.app', function ($view) {
            $view->with('mainLink', request()->is('/') ? 'menu-link__active': '');
            $view->with('articleLink', (request()->is('articles') or request()->is('articles/*')) ? 'menu-link__active' : '');
        });
    }
}
