<?php

use Inertia\Inertia;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/', function () {
        return Inertia::render('dashboard');
    });

    Route::resource('user', UserController::class); //User Controller

    Route::post('role/{role}', [RoleController::class, 'grantPermission'])->name('role.grant-permission');
    Route::resource('role', RoleController::class);

    Route::resource('profile', ProfileController::class); // Profile Controller
});

