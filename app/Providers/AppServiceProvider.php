<?php

namespace App\Providers;

use App\Models\Post;
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
        Paginator::useBootstrap();
        $menuTop = Topic::all();
        $posts = Post::where('highlight', '=', '1')->orderBy('id', 'desc')->limit(4)->get();
        $postNews = Post::orderBy('id', 'desc')->paginate(6);
        View::share('menuTop', $menuTop);
        View::share('posts', $posts);
        View::share('postNews', $postNews);
    }
}
