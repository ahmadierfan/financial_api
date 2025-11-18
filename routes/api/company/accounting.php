<?php

use App\Http\Controllers\Main\MAccountingdocController;
use App\Http\Controllers\view\WWarehousekardexController;
use App\Http\Controllers\view\WWarehouseinventoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('financial/v1/company/accounting')->group(function () {
    Route::middleware('auth:api')->group(function () {
       
        Route::get('get-accounting-docs', [MAccountingdocController::class, 'index']);
        Route::post('create-accounting-doc', [MAccountingdocController::class, 'createDoc']);
        Route::delete('delete-accounting-doc', [MAccountingdocController::class, 'deleteDoc']);
        Route::post('update-accounting-doc', [MAccountingdocController::class, 'updateDoc']);
        Route::get('requirement', [MAccountingdocController::class, 'requirement']);
       

    });
});