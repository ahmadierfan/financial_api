<?php

use App\Http\Controllers\AuthController;

Route::prefix('financial/v1')->group(function () {
    Route::middleware(['auth:api'])->group(function () {
        Route::get('profile', [AuthController::class, 'profile']);
    });
    Route::prefix('auth')->group(function () {
        Route::post('login', [AuthController::class, 'login'])->name('login');
    });
});
