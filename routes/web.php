<?php

use Inertia\Inertia;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum'])->get('/', function () {
    return Inertia::render('dashboard');
});
