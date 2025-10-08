<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\b_api;
use App\Models\r_menusapi;
use App\Models\b_menu;

class BApiSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $apis = [
            'accounting/' => [
                'v1/' => [
                    'company/' => [
                        'basicdata/' => [
                            ['pk_api' => 11010101, 'api' => 'roles', 'fk_menu' => '63', 'fk_apitype' => 1],
                            ['pk_api' => 11010102, 'api' => 'bankaccounts'],
                            ['pk_api' => 11010104, 'api' => 'units', 'fk_menu' => '6', 'fk_apitype' => 1],
                            ['pk_api' => 11010105, 'api' => 'update-unit', 'fk_menu' => '6', 'fk_apitype' => 3],
                            ['pk_api' => 11010106, 'api' => 'create-unit', 'fk_menu' => '5', 'fk_apitype' => 2],
                            ['pk_api' => 11010107, 'api' => 'delete-unit', 'fk_menu' => '6', 'fk_apitype' => 4],
                            ['pk_api' => 11010108, 'api' => 'banks', 'fk_menu' => '9', 'fk_apitype' => 1],
                            ['pk_api' => 11010109, 'api' => 'create-bank', 'fk_menu' => '8', 'fk_apitype' => 2],
                            ['pk_api' => 11010110, 'api' => 'update-bank', 'fk_menu' => '9', 'fk_apitype' => 3],
                            ['pk_api' => 11010111, 'api' => 'delete-bank', 'fk_menu' => '9', 'fk_apitype' => 4],
                            ['pk_api' => 11010112, 'api' => 'money-boxes', 'fk_menu' => '12', 'fk_apitype' => 1],
                            ['pk_api' => 11010113, 'api' => 'create-money-box', 'fk_menu' => '11', 'fk_apitype' => 2],
                            ['pk_api' => 11010114, 'api' => 'update-money-box', 'fk_menu' => '12', 'fk_apitype' => 3],
                            ['pk_api' => 11010115, 'api' => 'delete-money-box', 'fk_menu' => '12', 'fk_apitype' => 4],
                            ['pk_api' => 11010116, 'api' => 'bank-accounts', 'fk_menu' => '15', 'fk_apitype' => 1],
                            ['pk_api' => 11010117, 'api' => 'create-bank-account', 'fk_menu' => '14', 'fk_apitype' => 2],
                            ['pk_api' => 11010118, 'api' => 'update-bank-account', 'fk_menu' => '15', 'fk_apitype' => 3],
                            ['pk_api' => 11010119, 'api' => 'delete-bank-account', 'fk_menu' => '15', 'fk_apitype' => 4],
                            ['pk_api' => 11010120, 'api' => 'warehouses', 'fk_menu' => '18', 'fk_apitype' => 1],
                            ['pk_api' => 11010121, 'api' => 'create-warehouse', 'fk_menu' => '17', 'fk_apitype' => 2],
                            ['pk_api' => 11010122, 'api' => 'update-warehouse', 'fk_menu' => '18', 'fk_apitype' => 3],
                            ['pk_api' => 11010123, 'api' => 'delete-warehouse', 'fk_menu' => '18', 'fk_apitype' => 4],
                            ['pk_api' => 11010124, 'api' => 'products', 'fk_menu' => '21', 'fk_apitype' => 1],
                            ['pk_api' => 11010125, 'api' => 'create-product', 'fk_menu' => '20', 'fk_apitype' => 2],
                            ['pk_api' => 11010126, 'api' => 'update-product', 'fk_menu' => '21', 'fk_apitype' => 3],
                            ['pk_api' => 11010127, 'api' => 'delete-product', 'fk_menu' => '21', 'fk_apitype' => 4],
                            ['pk_api' => 11010128, 'api' => 'role-users'],
                            ['pk_api' => 11010130, 'api' => 'create-role', 'fk_menu' => '62', 'fk_apitype' => 2],
                            ['pk_api' => 11010131, 'api' => 'update-role', 'fk_menu' => '63', 'fk_apitype' => 3],
                            ['pk_api' => 11010132, 'api' => 'delete-role', 'fk_menu' => '63', 'fk_apitype' => 4],
                            ['pk_api' => 11010133, 'api' => 'delete-role-from-user'],
                            ['pk_api' => 11010134, 'api' => 'users-less-data'],
                            ['pk_api' => 11010135, 'api' => 'add-user-to-role'],
                            ['pk_api' => 11010136, 'api' => 'user-roles'],
                            ['pk_api' => 11010137, 'api' => 'add-menu-to-role'],
                            ['pk_api' => 11010138, 'api' => 'delete-menu-from-role'],
                            ['pk_api' => 11010139, 'api' => 'role-menus'],
                            ['pk_api' => 11010140, 'api' => 'menus'],
                            ['pk_api' => 11010141, 'api' => 'all-users', 'fk_menu' => '60', 'fk_apitype' => 1],
                            ['pk_api' => 11010142, 'api' => 'create-user', 'fk_menu' => '59', 'fk_apitype' => 2],
                            ['pk_api' => 11010143, 'api' => 'update-user', 'fk_menu' => '60', 'fk_apitype' => 3],
                            ['pk_api' => 11010144, 'api' => 'delete-user', 'fk_menu' => '60', 'fk_apitype' => 4],
                            ['pk_api' => 11010145, 'api' => 'product-requirment'],
                            ['pk_api' => 11010146, 'api' => 'product-categories', 'fk_menu' => '85', 'fk_apitype' => 1],
                            ['pk_api' => 11010147, 'api' => 'create-product-category', 'fk_menu' => '86', 'fk_apitype' => 2],
                            ['pk_api' => 11010148, 'api' => 'update-product-category', 'fk_menu' => '85', 'fk_apitype' => 3],
                            ['pk_api' => 11010149, 'api' => 'delete-product-category', 'fk_menu' => '85', 'fk_apitype' => 4],
                            ['pk_api' => 11010150, 'api' => 'warehouse-doc-requirment'],
                            ['pk_api' => 11010152, 'api' => 'user-addresses'],
                            ['pk_api' => 11010153, 'api' => 'search-product'],
                            ['pk_api' => 11010154, 'api' => 'user-logins', 'fk_menu' => '130', 'fk_apitype' => 1],
                        ],
                        'warehouse' => [
                            ['pk_api' => 11010201, 'api' => 'warehouses'],
                        ],
                        'commerce' => [
                            ['pk_api' => 11010301, 'api' => 'sale-invoices', 'fk_menu' => '110', 'fk_apitype' => 1],
                            ['pk_api' => 11010302, 'api' => 'create-sale-invoice', 'fk_menu' => '111', 'fk_apitype' => 2],
                            ['pk_api' => 11010303, 'api' => 'update-sale-invoice', 'fk_menu' => '110', 'fk_apitype' => 3],
                            ['pk_api' => 11010304, 'api' => 'delete-sale-invoice', 'fk_menu' => '110', 'fk_apitype' => 4],
                            ['pk_api' => 11010305, 'api' => 'sale-invoice-requirment'],

                            ['pk_api' => 11010306, 'api' => 'buy-invoices', 'fk_menu' => '107', 'fk_apitype' => 1],
                            ['pk_api' => 11010307, 'api' => 'create-buy-invoice', 'fk_menu' => '108', 'fk_apitype' => 2],
                            ['pk_api' => 11010308, 'api' => 'update-buy-invoice', 'fk_menu' => '107', 'fk_apitype' => 3],
                            ['pk_api' => 11010309, 'api' => 'delete-buy-invoice', 'fk_menu' => '107', 'fk_apitype' => 4],
                            ['pk_api' => 11010310, 'api' => 'buy-invoice-requirment'],

                            ['pk_api' => 11010311, 'api' => 'return-invoices', 'fk_menu' => '113', 'fk_apitype' => 1],
                            ['pk_api' => 11010312, 'api' => 'create-return-invoice', 'fk_menu' => '114', 'fk_apitype' => 2],
                            ['pk_api' => 11010313, 'api' => 'update-return-invoice', 'fk_menu' => '113', 'fk_apitype' => 3],
                            ['pk_api' => 11010314, 'api' => 'delete-return-invoice', 'fk_menu' => '113', 'fk_apitype' => 4],
                            ['pk_api' => 11010315, 'api' => 'return-invoice-requirment'],
                        ],
                        'treasury' => [
                            ['pk_api' => 11010404, 'api' => 'test'],
                        ],
                    ],
                    '' => [
                        ['pk_api' => 110201, 'api' => 'auth-user-panel-data'],
                        ['pk_api' => 110202, 'api' => 'profile'],
                        ['pk_api' => 110203, 'api' => 'menu-columns'],
                    ]
                ]
            ],
            'homeease/' => [
                'v1' => [
                    'company/' => [
                        ['pk_api' => 120101, 'api' => 'search-user-for-company'],
                        ['pk_api' => 120102, 'api' => 'technicians'],
                        ['pk_api' => 120103, 'api' => 'province-cities'],
                        ['pk_api' => 120104, 'api' => 'provinces'],
                        ['pk_api' => 120105, 'api' => 'element-categories'],
                        ['pk_api' => 120106, 'api' => 'element-category-elements'],
                        ['pk_api' => 120107, 'api' => 'element-subelements'],
                        ['pk_api' => 120108, 'api' => 'receptions', 'fk_menu' => '3', 'fk_apitype' => 1],
                        ['pk_api' => 120109, 'api' => 'create-reception', 'fk_menu' => '2', 'fk_apitype' => 2],
                        ['pk_api' => 120110, 'api' => 'update-reception', 'fk_menu' => '3', 'fk_apitype' => 3],
                        ['pk_api' => 120111, 'api' => 'destroy-reception', 'fk_menu' => '3', 'fk_apitype' => 4],
                        ['pk_api' => 120114, 'api' => 'geo-data', 'fk_menu' => '23', 'fk_apitype' => 1],
                        ['pk_api' => 120115, 'api' => 'city-zones'],
                        ['pk_api' => 120116, 'api' => 'create-geo-data', 'fk_menu' => '23', 'fk_apitype' => 2],
                        ['pk_api' => 120117, 'api' => 'update-geo-data', 'fk_menu' => '23', 'fk_apitype' => 3],
                        ['pk_api' => 120118, 'api' => 'delete-geo-data', 'fk_menu' => '23', 'fk_apitype' => 4],
                        ['pk_api' => 120119, 'api' => 'element-data', 'fk_menu' => '24', 'fk_apitype' => 1],
                        ['pk_api' => 120120, 'api' => 'create-element-data', 'fk_menu' => '24', 'fk_apitype' => 2],
                        ['pk_api' => 120121, 'api' => 'update-element-data', 'fk_menu' => '24', 'fk_apitype' => 3],
                        ['pk_api' => 120122, 'api' => 'delete-element-data', 'fk_menu' => '24', 'fk_apitype' => 4],
                        ['pk_api' => 120123, 'api' => 'reject-reasons', 'fk_menu' => '54', 'fk_apitype' => 1],
                        ['pk_api' => 120124, 'api' => 'create-reject-reason', 'fk_menu' => '53', 'fk_apitype' => 2],
                        ['pk_api' => 120125, 'api' => 'update-reject-reason', 'fk_menu' => '54', 'fk_apitype' => 3],
                        ['pk_api' => 120126, 'api' => 'delete-reject-reason', 'fk_menu' => '54', 'fk_apitype' => 4],
                        ['pk_api' => 120127, 'api' => 'agencies', 'fk_menu' => '30', 'fk_apitype' => 1],
                        ['pk_api' => 120128, 'api' => 'create-agency', 'fk_menu' => '29', 'fk_apitype' => 2],
                        ['pk_api' => 120129, 'api' => 'update-agency', 'fk_menu' => '30', 'fk_apitype' => 3],
                        ['pk_api' => 120130, 'api' => 'delete-agency', 'fk_menu' => '30', 'fk_apitype' => 4],
                        ['pk_api' => 120131, 'api' => 'all-technicians', 'fk_menu' => '33', 'fk_apitype' => 1],
                        ['pk_api' => 120132, 'api' => 'create-technician', 'fk_menu' => '32', 'fk_apitype' => 2],
                        ['pk_api' => 120133, 'api' => 'update-technician', 'fk_menu' => '33', 'fk_apitype' => 3],
                        ['pk_api' => 120134, 'api' => 'delete-technician', 'fk_menu' => '33', 'fk_apitype' => 4],
                        ['pk_api' => 120135, 'api' => 'technician-data'],
                        ['pk_api' => 120136, 'api' => 'invoices', 'fk_menu' => '42', 'fk_apitype' => 1],
                        ['pk_api' => 120137, 'api' => 'leave-requests', 'fk_menu' => '51', 'fk_apitype' => 1],
                        ['pk_api' => 120138, 'api' => 'all-information-report', 'fk_menu' => '72', 'fk_apitype' => 1],
                        ['pk_api' => 120139, 'api' => 'data-for-information-report'],
                        ['pk_api' => 120140, 'api' => 'send-report-for-sms'],
                        ['pk_api' => 120141, 'api' => 'products', 'fk_menu' => '28', 'fk_apitype' => 1],
                        ['pk_api' => 120142, 'api' => 'create-product', 'fk_menu' => '55', 'fk_apitype' => 2],
                        ['pk_api' => 120143, 'api' => 'update-product', 'fk_menu' => '28', 'fk_apitype' => 3],
                        ['pk_api' => 120144, 'api' => 'delete-product', 'fk_menu' => '28', 'fk_apitype' => 4],
                        ['pk_api' => 120145, 'api' => 'invoice-records'],
                        ['pk_api' => 120146, 'api' => 'wallet-transactions', 'fk_menu' => '48', 'fk_apitype' => 1],
                        ['pk_api' => 120147, 'api' => 'increase-wallet', 'fk_menu' => '47', 'fk_apitype' => 2],
                        ['pk_api' => 120148, 'api' => 'decrease-wallet', 'fk_menu' => '75', 'fk_apitype' => 2],
                        ['pk_api' => 120149, 'api' => 'user-wallets', 'fk_menu' => '74', 'fk_apitype' => 1],
                        ['pk_api' => 120150, 'api' => 'user-less-data'],
                        ['pk_api' => 120151, 'api' => 'invoice-all-detail'],
                        ['pk_api' => 120152, 'api' => 'technicians-settle', 'fk_menu' => '77', 'fk_apitype' => 1],
                        ['pk_api' => 120153, 'api' => 'technician-settle-data'],
                        ['pk_api' => 120154, 'api' => 'all-customers', 'fk_menu' => '71', 'fk_apitype' => 1],
                        ['pk_api' => 120155, 'api' => 'job-requests', 'fk_menu' => '34', 'fk_apitype' => 1],
                        ['pk_api' => 120156, 'api' => 'introduction-methods'],
                        ['pk_api' => 120157, 'api' => 'wallet-transaction-requirement'],
                        ['pk_api' => 120158, 'api' => 'all-rating', 'fk_menu' => '52', 'fk_apitype' => 1],
                        ['pk_api' => 120159, 'api' => 'technician-to-settled'],
                        ['pk_api' => 120161, 'api' => 'reception-requirement'],
                        ['pk_api' => 120162, 'api' => 'issue-data'],
                        ['pk_api' => 120163, 'api' => 'create-issue-data'],
                        ['pk_api' => 120164, 'api' => 'update-issue-data'],
                        ['pk_api' => 120165, 'api' => 'delete-issue-data'],
                        ['pk_api' => 120166, 'api' => 'reception-events'],
                        ['pk_api' => 120167, 'api' => 'technician-location'],
                        ['pk_api' => 120168, 'api' => 'reception-statuses'],
                        ['pk_api' => 120169, 'api' => 'update-invoice'],
                        ['pk_api' => 120170, 'api' => 'user-wallet-ballance'],
                        ['pk_api' => 120171, 'api' => 'month-receptions-and-sum'],
                        ['pk_api' => 120172, 'api' => 'receptions-leads', 'fk_menu' => '82', 'fk_apitype' => 1],
                        ['pk_api' => 120173, 'api' => 'receptions-archive', 'fk_menu' => '83', 'fk_apitype' => 1],
                        ['pk_api' => 120174, 'api' => 'reject-statuses'],
                        ['pk_api' => 120175, 'api' => 'reception-invoice-pay'],
                        ['pk_api' => 120176, 'api' => 'operator-receptions', 'fk_menu' => '127', 'fk_apitype' => 1],
                        ['pk_api' => 120177, 'api' => 'reception-issue'],
                        ['pk_api' => 120178, 'api' => 'create-reception-issue'],
                        ['pk_api' => 120179, 'api' => 'import-excel'],
                        ['pk_api' => 120180, 'api' => 'settles', 'fk_menu' => '141', 'fk_apitype' => 1],
                        ['pk_api' => 120181, 'api' => 'online-transactions', 'fk_menu' => '143', 'fk_apitype' => 1],
                        ['pk_api' => 120182, 'api' => 'set-active-reception'],
                        ['pk_api' => 120183, 'api' => 'reception-dashboard'],
                    ],
                    'customer/' => [
                        ['pk_api' => 120201, 'api' => 'send-ticket'],
                        ['pk_api' => 120202, 'api' => 'tickets'],
                        ['pk_api' => 120203, 'api' => 'ticket-detail'],
                        ['pk_api' => 120204, 'api' => 'receptions'],
                        ['pk_api' => 120205, 'api' => 'invoice'],
                        ['pk_api' => 120206, 'api' => 'new-reception'],
                    ],
                    'technician/' => [
                        ['pk_api' => 120301, 'api' => 'profile'],
                        ['pk_api' => 120302, 'api' => 'change-available'],
                        ['pk_api' => 120303, 'api' => 'receptions'],
                        ['pk_api' => 120304, 'api' => 'reject-reasons'],
                        ['pk_api' => 120305, 'api' => 'reception-types'],
                        ['pk_api' => 120306, 'api' => 'change-reception-status'],
                        ['pk_api' => 120307, 'api' => 'save-mobile-info'],
                        ['pk_api' => 120308, 'api' => 'invoice-detail'],
                        ['pk_api' => 120309, 'api' => 'create-update-invoice'],
                        ['pk_api' => 120310, 'api' => 'products-search'],
                        ['pk_api' => 120311, 'api' => 'create-product'],
                        ['pk_api' => 120312, 'api' => 'increase-wallet'],
                        ['pk_api' => 120313, 'api' => 'wallet-transactions'],
                        ['pk_api' => 120314, 'api' => 'send-ticket'],
                        ['pk_api' => 120315, 'api' => 'tickets'],
                        ['pk_api' => 120316, 'api' => 'ticket-detail'],
                        ['pk_api' => 120317, 'api' => 'new-location-for-tracking'],
                        ['pk_api' => 120318, 'api' => 'profile'],
                        ['pk_api' => 120319, 'api' => 'reception-pay'],
                        ['pk_api' => 120320, 'api' => 'create-leave-request'],
                        ['pk_api' => 120321, 'api' => 'performance'],
                        ['pk_api' => 120322, 'api' => 'customer-pay-deposit'],
                        ['pk_api' => 120323, 'api' => 'element-category'],
                        ['pk_api' => 120324, 'api' => 'create-reception'],
                        ['pk_api' => 120325, 'api' => 'close-reception'],
                        ['pk_api' => 120326, 'api' => 'add-note'],
                    ]
                ]
            ],
            'crm/' => [
                'v1' => [
                    'company/' => [
                        ['pk_api' => 130101, 'api' => 'sms-parameters'],
                        ['pk_api' => 130102, 'api' => 'report-data'],
                        ['pk_api' => 130103, 'api' => 'tickets', 'fk_menu' => '45', 'fk_apitype' => 1],
                        ['pk_api' => 130104, 'api' => 'create-ticket', 'fk_menu' => '44', 'fk_apitype' => 2],
                        ['pk_api' => 130105, 'api' => 'update-ticket', 'fk_menu' => '45', 'fk_apitype' => 3],
                        ['pk_api' => 130106, 'api' => 'delete-ticket', 'fk_menu' => '45', 'fk_apitype' => 4],
                        ['pk_api' => 130107, 'api' => 'sended-sms', 'fk_menu' => '68', 'fk_apitype' => 1],
                        ['pk_api' => 130108, 'api' => 'sms-patterns', 'fk_menu' => '129', 'fk_apitype' => 1],
                        ['pk_api' => 130109, 'api' => 'update-sms-paattern', 'fk_menu' => '128', 'fk_apitype' => 3],
                        ['pk_api' => 130110, 'api' => 'chatbot-list', 'fk_menu' => '133', 'fk_apitype' => 1],
                        ['pk_api' => 130111, 'api' => 'chatbot-chat-detail'],
                        ['pk_api' => 130112, 'api' => 'chatbot-setting'],
                        ['pk_api' => 130113, 'api' => 'upadte-chatbot-setting'],
                        ['pk_api' => 130114, 'api' => 'activities', 'fk_menu' => '139', 'fk_apitype' => 1],
                        ['pk_api' => 130115, 'api' => 'my-activities', 'fk_menu' => '140', 'fk_apitype' => 1],
                    ]
                ]
            ]
        ];

        $now = now();

        function processApis($basePath, $sections, $now)
        {
            foreach ($sections as $key => $value) {
                if (is_array($value) && isset($value[0]['api'])) {
                    foreach ($value as $endpoint) {
                        $fullPath = rtrim($basePath . $key, '/');
                        $fk_apitype = 5;
                        if (isset($endpoint['fk_apitype']))
                            $fk_apitype = $endpoint['fk_apitype'];
                        b_api::firstOrCreate(
                            [
                                'pk_api' => $endpoint['pk_api'],
                                'fk_apitype' => $fk_apitype,
                                'api' => "{$fullPath}/{$endpoint['api']}",
                            ],
                            [
                                'created_at' => $now,
                                'updated_at' => $now,
                            ]
                        );
                        if (isset($endpoint['fk_menu'])) {
                            r_menusapi::createOrFirst([
                                'fk_menu' => $endpoint['fk_menu'],
                                'fk_api' => $endpoint['pk_api'],
                            ]);
                            if ($endpoint['fk_apitype'] == 1)
                                $col = 'fk_apiget';
                            elseif ($endpoint['fk_apitype'] == 2)
                                $col = 'fk_apicreate';
                            elseif ($endpoint['fk_apitype'] == 3)
                                $col = 'fk_apiupdate';
                            elseif ($endpoint['fk_apitype'] == 4)
                                $col = 'fk_apidestroy';
                            b_menu::where('pk_menu', $endpoint['fk_menu'])
                                ->update([
                                    $col => $endpoint['pk_api']
                                ]);
                        }
                    }
                } else {
                    $newBasePath = rtrim($basePath . $key, '/') . '/';
                    processApis($newBasePath, $value, $now);
                }
            }
        }

        foreach ($apis as $system => $sections) {
            processApis("api/{$system}", $sections, $now);
        }

    }
}
