<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Category;
use Illuminate\Support\Facades\Schema;
use ConsoleTVs\Charts\Registrar as Charts;

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
    public function boot(Charts $charts)
    {
        if (Schema::hasTable('categories')) {
            $categories = Category::all();
            View::share('categories', $categories);
        }
        $charts->register([
            \App\Charts\SampleChart::class
        ]);
    }
  
}
