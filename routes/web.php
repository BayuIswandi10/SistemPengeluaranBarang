<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('auth.login');
});

Route::post('/auth',[AuthController::class,'login'])->name('logins.auth');

Route::get('Dashboard',[DashboardController::class,'index'])->name('dashboard.index');