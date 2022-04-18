<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

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
        if(request()->is('admin*')) {
            config([
                'session' => config('sessionadmin'),
                'view' => config('viewadmin'),
                'auth' => config('authadmin'),
            ]);
        } else {
            config([
                'session' => config('sessionuser'),
                'view' => config('viewuser'),
                'auth' => config('authuser'),
            ]);
        }

        Password::defaults(function() {
            $rule = Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols();
                // ->uncompromised();
            return $rule;
        });
    }
}
