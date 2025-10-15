<?php

use Illuminate\Support\Facades\Route;

Route::prefix('financial/v1/company/treasury')->group(function () {
    Route::middleware('auth:api')->group(function () {
        //Route::get('warehouse-doc-requirment', [MWarehousedocController::class, 'requirment']);
    });
});