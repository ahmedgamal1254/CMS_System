<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use \Illuminate\Support\Facades\View;
use App\models\Page;
use App\Notification;
use App\User;
use Illuminate\Support\Facades\DB;

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
        View::share('page',DB::table('pages')->get());
        View::share('menuItems', DB::table('notifications')->where('notifiable_id',9)->get());
    }
}
