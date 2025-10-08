<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Systems\Crm;
use App\Http\Controllers\Systems\Homeease;
use App\Http\Controllers\Base\BMenuController;
use App\Http\Controllers\Sub\SMenucolumnController;


///////////////////////////// homeease routes

//////homeese profile
Route::any('homeease/v1/tecunician/profile', [Homeease::class, 'forwardRequest'])
    ->middleware(['auth:api', 'userPermission'])
    ->where('any', '^(?!auth).*');


//////homeese customer
Route::prefix('homeease/v1/customer/auth')->group(function () {
    Route::any('{any}', [Homeease::class, 'forwardRequest']);
});
Route::prefix('homeease/v1/customer')->middleware(['auth:api', 'userPermission'])->group(function () {
    Route::any('{any}', [Homeease::class, 'forwardRequest'])
        ->where('any', '^(?!auth).*');
});

//////homeese company
Route::prefix('homeease/v1/company/auth')->group(function () {
    Route::any('{any}', [Homeease::class, 'forwardRequest']);
});
Route::prefix('homeease/v1/company')->middleware(['auth:api', 'userPermission'])->group(function () {
    Route::any('{any}', [Homeease::class, 'forwardRequest'])
        ->where('any', '^(?!auth).*');
});

//////homeese technician
Route::prefix('homeease/v1/technician/auth')->group(function () {
    Route::any('{any}', [Homeease::class, 'forwardRequest']);
});
Route::prefix('homeease/v1/technician')->middleware(['auth:api', 'userPermission'])->group(function () {
    Route::any('{any}', [Homeease::class, 'forwardRequest'])
        ->where('any', '^(?!auth).*');
});

///////////////////////////// crm routes

Route::prefix('crm/')->group(function () {
    Route::any('{any}', [Crm::class, 'forwardRequest'])->where('any', '.*');
});

///////////////////////////// accounting routes

Route::prefix('accounting/v1')->group(function () {
    Route::middleware('auth:api')->group(function () {
        Route::get('profile', [AuthController::class, 'profile']);
        Route::get('auth-user-panel-data', [BMenuController::class, 'authUser']);
        Route::get('menu-data', [SMenucolumnController::class, 'showForMenus']);
    });

    Route::prefix('auth')->group(function () {
        Route::post('login-just-token', [AuthController::class, 'loginJustToken'])->name('loginjusttokn');
        Route::post('login', [AuthController::class, 'login'])->name('login');

        Route::post('sync-user', [AuthController::class, 'syncUser'])
            ->middleware('internal')
            ->name('syncUser');
    });
});

Route::post('logout', function () {
    auth()->logout();
})->middleware('auth:api');
