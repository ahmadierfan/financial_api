<?php

use Illuminate\Support\Facades\Route;

Route::prefix('accounting/v1/company/treasury')->group(function () {
    Route::middleware('auth:api')->group(function () {
        //Route::get('warehouse-doc-requirment', [MWarehousedocController::class, 'requirment']);
    });
});