<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use View;

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
        $info_s = config('system.info');
        View::share('info_s', $info_s);
        $info_seo = config('seo.info');
        View::share('info_seo', $info_seo);
        // View::composer(['wellcome', 'font-end.page.video'], function ($view) {
        //     $view->with(['videos'=>$_videos]);
        // }
    }
}
