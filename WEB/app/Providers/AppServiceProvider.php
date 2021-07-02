<?php

namespace App\Providers;

use GuzzleHttp\Psr7\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

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
        // if (
        //     Route::current()->uri != 'api.informations' &&
        //     Route::current()->uri != 'api.informations.v1' &&
        //     Route::current()->uri != 'redirect-login' &&
        //     Route::current()->uri != 'login' &&
        //     Route::current()->uri != 'password' &&
        //     Route::current()->uri != 'password.reset' &&
        //     Route::current()->uri != 'register' &&
        //     Route::current()->uri != 'register.confirm'
        // ) {
        // if (URL::current()  != url('/api/v1') && URL::current()  != url('/api')) {
        $last_version = app('App\Http\Controllers\Web\VersionController')->getLastVersion();
        $user = Auth::user();
        view()->share(['last_version' => $last_version, 'user' => $user]);
        // }
        // }
    }
}
