<?php

namespace App\Providers;

use Inertia\Inertia;
use Laravel\Fortify\Fortify;
use App\Actions\Fortify\CreateNewUser;
use Illuminate\Support\ServiceProvider;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;

class FortifyServiceProvider extends ServiceProvider
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
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        Fortify::loginView(function () {
            return Inertia::render('Auth/Login');
        });

        Fortify::requestPasswordResetLinkView(function () {
            return Inertia::render('Auth/PasswordReset');
        });

        Fortify::resetPasswordView(function ($request) {
            return Inertia::render('Auth/ResetPassword', [
                'email' => $request->email,
                'token' => $request->route('token')
                ]);
        });

        // Fortify::verifyEmailView(function () {
        //     return Inertia::render('Auth/VerifyEmail');
        // });
    }
}
