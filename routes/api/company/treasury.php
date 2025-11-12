<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\MFinancialrequestController;
use App\Http\Controllers\Main\MCheckbookController;

Route::prefix('financial/v1/company/treasury')->group(function () {
    Route::middleware('auth:api')->group(function () {
        // Receive
        Route::get('get-receive-docs', [MFinancialrequestController::class, 'getReceiveDocs']);
        Route::post('create-receive-doc', [MFinancialrequestController::class, 'createReceiveDoc']);
        Route::delete('delete-receive-doc', [MFinancialrequestController::class, 'deleteReceiveDoc']);
        Route::post('update-receive-doc', [MFinancialrequestController::class, 'updateReceiveDoc']);
        Route::get('receive-requirment', [MFinancialrequestController::class, 'receiveRequirment']);
        // payment
        Route::get('get-payment-docs', [MFinancialrequestController::class, 'getPaymentDocs']);
        Route::post('create-payment-doc', [MFinancialrequestController::class, 'createPaymentDoc']);
        Route::delete('delete-payment-doc', [MFinancialrequestController::class, 'deletePaymentDoc']);
        Route::post('update-payment-doc', [MFinancialrequestController::class, 'updatepaymentDoc']);
        Route::get('payment-requirment', [MFinancialrequestController::class, 'paymentRequirment']);
        // check
        Route::get('check-edit-requirment', [MCheckbookController::class, 'checkRequirment']);

        Route::get('get-payment-checks', [MCheckbookController::class, 'paymentCheck']);
        Route::post('update-payment-check', [MCheckbookController::class, 'updatePaymentCheck']);
        Route::delete('delete-payment-check', [MCheckbookController::class, 'deletePaymentCheck']);

        Route::get('get-receive-checks', [MCheckbookController::class, 'receiveCheck']);
        Route::post('update-receive-check', [MCheckbookController::class, 'updateReceiveCheck']);
        Route::delete('delete-receive-check', [MCheckbookController::class, 'deleteReceiveCheck']);
    });
});