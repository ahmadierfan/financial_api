<?php

use App\Http\Controllers\Main\MWarehousedocController;
use Illuminate\Support\Facades\Route;

Route::prefix('financial/v1/company/warehouse')->group(function () {
    Route::middleware('auth:api')->group(function () {
        Route::get('warehouse-doc-requirment', [MWarehousedocController::class, 'requirment']);
        // recieve
        Route::get('get-receive-docs', [MWarehousedocController::class, 'getReceiveDocs']);
        Route::post('create-receive-doc', [MWarehousedocController::class, 'createReceiveDoc']);
        Route::delete('delete-receive-doc', [MWarehousedocController::class, 'deleteReceiveDoc']);
        Route::post('update-receive-doc', [MWarehousedocController::class, 'updateReceiveDoc']);
        Route::get('receive-requirment', [MWarehousedocController::class, 'receiveRequirment']);
        // exit
        Route::get('get-exit-docs', [MWarehousedocController::class, 'getExitDocs']);
        Route::post('create-exit-doc', [MWarehousedocController::class, 'createExitDoc']);
        Route::delete('delete-exit-doc', [MWarehousedocController::class, 'deleteExitDoc']);
        Route::post('update-exit-doc', [MWarehousedocController::class, 'updateExitDoc']);
        Route::get('exit-requirment', [MWarehousedocController::class, 'exitRequirment']);
    });
});