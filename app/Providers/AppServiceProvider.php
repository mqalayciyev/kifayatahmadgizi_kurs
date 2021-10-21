<?php

namespace App\Providers;

use App\Models\About;
use App\Models\Courses;
use App\Models\HomeSlider;
use App\Models\Tests;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

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
        Schema::defaultStringLength(191);
        View::composer('*', function ($view) {
            $about = About::find(1);
            $slider = HomeSlider::where('status', 1)->get();
            $courses_nav = Courses::limit(5)->get();
            $courses_footer = Courses::limit(5)->get();
            $tests_nav = Tests::limit(5)->get();
            return $view->with([
                'about' => $about,
                'slider' => $slider,
                'courses_nav' => $courses_nav,
                'courses_footer' => $courses_footer,
                'tests_nav' => $tests_nav,
            ]);
        });
    }
}
