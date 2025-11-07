<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\MFinancialrequestController;

Route::prefix('financial/v1/company/treasury')->group(function () {
    Route::middleware('auth:api')->group(function () {
        // Receive
        Route::get('get-receive-docs', [MFinancialrequestController::class, 'getReceiveDocs']);
        Route::post('create-receive-doc', [MFinancialrequestController::class, 'createReceiveDoc']);
        Route::delete('delete-receive-doc', [MFinancialrequestController::class, 'deleteReceiveDoc']);
        Route::post('update-receive-doc', [MFinancialrequestController::class, 'updateReceiveDoc']);
        Route::get('receive-requirment', [MFinancialrequestController::class, 'receiveRequirment']);
    });
});