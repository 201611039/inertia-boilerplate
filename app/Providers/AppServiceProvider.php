<?php

namespace App\Providers;

use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
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

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Inertia::share([
            'errors' => function () {
                return Session::get('errors')
                    ? Session::get('errors')->getBag('default')->getMessages()
                    : (object) [];
            },

            'state' => function () {
                return Session::get('status')??'';
            },
            'flash' => function () {
                return ['message' => Session::get('message')];
            },

            'auth' => function () {
                return [
                    'user' => Auth::user() ? [
                        'id' => Auth::user()->id,
                        'name' => Auth::user()->name,
                        'profile' => [
                            'id' => Auth::user()->profile->id,
                            'photo_path' => Auth::user()->profile->photo_path,
                        ]
                    ] : null
                ];
            }
        ]);
    }
}
