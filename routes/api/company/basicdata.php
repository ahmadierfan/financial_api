<?php

use App\Http\Controllers\Base\BRoleController;
use App\Http\Controllers\Base\BBankController;
use App\Http\Controllers\Base\BUnitController;
use App\Http\Controllers\Base\BMenuController;
use App\Http\Controllers\Main\MBankaccountController;
use App\Http\Controllers\Base\BProductcategoryController;
use App\Http\Controllers\Main\MMoneyboxController;
use App\Http\Controllers\Main\MProductController;
use App\Http\Controllers\Main\MWarehouseController;
use App\Http\Controllers\Sub\SUseraddressController;
use App\Http\Controllers\Sub\SUserloginController;
use App\Http\Controllers\Relation\RUsersroleController;
use App\Http\Controllers\Relation\RMenusroleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('accounting/v1/company/basicdata')->group(function () {
    Route::middleware('auth:api')->group(function () {

        //role and access
        Route::get('roles', [BRoleController::class, 'index']);
        Route::post('create-role', [BRoleController::class, 'createRole']);
        Route::post('update-role', [BRoleController::class, 'updateRole']);

        Route::post('add-user-to-role', [RUsersroleController::class, 'addUserToRole']);
        Route::delete('delete-role', [BRoleController::class, 'deleteRole']);

        Route::get('user-roles', [RUsersroleController::class, 'userRoles']);
        Route::get('role-users', [RUsersroleController::class, 'roleUsers']);
        Route::delete('delete-role-from-user', [RUsersroleController::class, 'deleteUser']);

        //menu
        Route::delete('delete-menu-from-role', [RMenusroleController::class, 'delete']);
        Route::post('add-menu-to-role', [RMenusroleController::class, 'create']);
        Route::get('role-menus', [RMenusroleController::class, 'roleMenus']);
        Route::get('menus', [BMenuController::class, 'index']);

        //user managment
        Route::post('create-user', [UserController::class, 'createUser']);
        Route::post('update-user', [UserController::class, 'updateUser']);
        Route::delete('delete-user', [UserController::class, 'deleteUser']);
        Route::get('all-users', [UserController::class, 'forCompany']);
        Route::get('users-less-data', [UserController::class, 'lessData']);

        Route::get('users-addresses', [SUseraddressController::class, 'userAddress']);

        // Bank Account Routes
        Route::post('create-bank-account', [MBankaccountController::class, 'createBankAccount']);
        Route::post('update-bank-account', [MBankaccountController::class, 'updateBankAccount']);
        Route::delete('delete-bank-account', [MBankaccountController::class, 'deleteBankAccount']);
        Route::get('bank-accounts', [MBankaccountController::class, 'getBankAccounts']);

        // Unit Routes
        Route::post('create-unit', [BUnitController::class, 'createUnit']);
        Route::post('update-unit', [BUnitController::class, 'updateUnit']);
        Route::delete('delete-unit', [BUnitController::class, 'deleteUnit']);
        Route::get('units', [BUnitController::class, 'forCompany']);

        // Bank Routes
        Route::post('create-bank', [BBankController::class, 'createBank']);
        Route::post('update-bank', [BBankController::class, 'updateBank']);
        Route::delete('delete-bank', [BBankController::class, 'deleteBank']);
        Route::get('banks', [BBankController::class, 'forCompany']);

        // Money Box Routes
        Route::post('create-money-box', [MMoneyboxController::class, 'createMoneybox']);
        Route::post('update-money-box', [MMoneyboxController::class, 'updateMoneybox']);
        Route::delete('delete-money-box', [MMoneyboxController::class, 'deleteMoneybox']);
        Route::get('money-boxes', [MMoneyboxController::class, 'forCompany']);

        // Warehouse Routes
        Route::post('create-warehouse', [MWarehouseController::class, 'createWarehouse']);
        Route::post('update-warehouse', [MWarehouseController::class, 'updateWarehouse']);
        Route::delete('delete-warehouse', [MWarehouseController::class, 'deleteWarehouse']);
        Route::get('warehouses', [MWarehouseController::class, 'index']);

        // Product Routes
        Route::post('create-product', [MProductController::class, 'createProduct']);
        Route::post('update-product', [MProductController::class, 'updateProduct']);
        Route::delete('delete-product', [MProductController::class, 'deleteProduct']);
        Route::get('products', [MProductController::class, 'index']);
        Route::get('product-requirment', [MProductController::class, 'requirment']);
        Route::get('search-product', [MProductController::class, 'searchForCompany']);

        // Product Category Routes
        Route::post('create-product-category', [BProductcategoryController::class, 'create']);
        Route::post('update-product-category', [BProductcategoryController::class, 'update']);
        Route::delete('delete-product-category', [BProductcategoryController::class, 'delete']);
        Route::get('product-categories', [BProductcategoryController::class, 'forCompany']);

        //User Logins
        Route::get('user-logins', [SUserloginController::class, 'index']);
    });
});
