<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Main\MInvoiceController;

Route::prefix('accounting/v1/company/commerce')->group(function () {
    Route::middleware(['auth:api', 'userPermission'])->group(function () {

        //sale invoice
        Route::get('sale-invoices', [MInvoiceController::class, 'saleInvoices']);
        Route::get('sale-invoice-requirment', [MInvoiceController::class, 'saleRequirment']);
        Route::post('create-sale-invoice', [MInvoiceController::class, 'saleCreate']);
        Route::post('update-sale-invoice', [MInvoiceController::class, 'saleUpdate']);
        Route::delete('delete-sale-invoice', [MInvoiceController::class, 'saleDelete']);

        // buy invoices
        Route::get('buy-invoices', [MInvoiceController::class, 'buyInvoices']);
        Route::get('buy-invoice-requirment', [MInvoiceController::class, 'buyRequirment']);
        Route::post('create-buy-invoice', [MInvoiceController::class, 'buyCreate']);
        Route::post('update-buy-invoice', [MInvoiceController::class, 'buyUpdate']);
        Route::delete('delete-buy-invoice', [MInvoiceController::class, 'buyDelete']);

        // return invoices
        Route::get('return-invoices', [MInvoiceController::class, 'returnInvoices']);
        Route::get('return-invoice-requirment', [MInvoiceController::class, 'returnRequirment']);
        Route::post('create-return-invoice', [MInvoiceController::class, 'returnCreate']);
        Route::post('update-return-invoice', [MInvoiceController::class, 'returnUpdate']);
        Route::delete('delete-return-invoice', [MInvoiceController::class, 'returnDelete']);
    });
});