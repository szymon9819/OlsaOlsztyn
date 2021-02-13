<?php

namespace App\Providers;

use App\Models\PostCategory;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\PostTag;


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
        //navbar elements
        View::composer('*', function ($view) {
            $view->with('navbarCategories', PostCategory::all())
                ->with('navbarTags', PostTag::all()
            );
        });
    }
}
