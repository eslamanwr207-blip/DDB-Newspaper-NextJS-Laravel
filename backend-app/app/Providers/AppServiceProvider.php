<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

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
        $settings = Setting::cheeksettings();

        $categories = Category::all();
        $posts = Post::all();
        $policy = Post::where('category_id', 1)->get();
        $economy = Post::where('category_id', 2)->get();
        $sports = Post::where('category_id', 3)->get();

        View()->share([
            'settings'=> $settings,
            'posts'=> $posts,
            'categories'=> $categories,
            'policy'=> $policy,
            'economy'=> $economy,
            'sports'=> $sports
        ]);

        app()->setLocale(session('locale', config('app.locale')));
    }
}
