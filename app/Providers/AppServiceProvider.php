<?php

namespace App\Providers;

use App\Models\Topic;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;


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
//        Blade::if('admin', function () {
//            return auth()->user() ;
//        });
            Paginator::useBootstrap();

            $menuTop = Topic::all();
            View::share('menuTop',$menuTop);
    }
}
