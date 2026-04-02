<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/',[AuthController::class,'index'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.submit');

    Route::middleware(['auth','is_admin'])->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('profile', [ProfileController::class, 'index'])->name('profile');
        Route::post('profile', [ProfileController::class, 'update_profile'])->name('update_profile');
        Route::post('change_password', [ProfileController::class, 'change_password'])->name('change_password');

        Route::get('users', [UsersController::class, 'index'])->name('users');
        Route::post('checkStatusUsers', [UsersController::class, 'checkStatusUsers'])->name('checkStatusUsers');
        Route::delete('deleteUser', [UsersController::class, 'deleteUser'])->name('admin.user.delete');

        
    });

});
