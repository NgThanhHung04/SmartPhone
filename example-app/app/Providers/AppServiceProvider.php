<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

use App\Models\ProductType;

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

        view()->composer('header',function($view){
            $loai_sp = ProductType::all();
            $view->with('loai_sp',$loai_sp);
        });

    }
}
