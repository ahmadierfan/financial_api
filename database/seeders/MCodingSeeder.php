<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class MCodingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // گروه اصلی - دارایی‌ها
        DB::table('m_codings')->insert([
            [
                'fk_registrar' => 1,
                'fk_accountingsubgroup' => null,
                'fk_codingtype' => 1, // دارایی
                'fk_coding' => null,
                'fk_codingnature' => 1, // بدهکار
                'coding' => 'دارایی‌های جاری',
                'codingcode' => 1,
                'is_pl' => 0,
                'isforcesub' => null
            ],
            [
                'fk_registrar' => 1,
                'fk_accountingsubgroup' => null,
                'fk_codingtype' => 2, // بدهی
                'fk_coding' => null,
                'fk_codingnature' => 2, // بستانکار
                'coding' => 'بدهی‌های جاری',
                'codingcode' => 2,
                'is_pl' => 0,
                'isforcesub' => null
            ],
            [
                'fk_registrar' => 1,
                'fk_accountingsubgroup' => null,
                'fk_codingtype' => 4, // درآمد
                'fk_coding' => null,
                'fk_codingnature' => 2, // بستانکار
                'coding' => 'درآمدهای عملیاتی',
                'codingcode' => 3,
                'is_pl' => 1,
                'isforcesub' => null
            ],
            [
                'fk_registrar' => 1,
                'fk_accountingsubgroup' => null,
                'fk_codingtype' => 5, // بهای تمام شده
                'fk_coding' => null,
                'fk_codingnature' => 1, // بدهکار
                'coding' => 'بهای تمام شده کالای فروش رفته',
                'codingcode' => 4,
                'is_pl' => 1,
                'isforcesub' => null
            ],
            [
                'fk_registrar' => 1,
                'fk_accountingsubgroup' => null,
                'fk_codingtype' => 6, // هزینه
                'fk_coding' => null,
                'fk_codingnature' => 1, // بدهکار
                'coding' => 'هزینه‌های عملیاتی',
                'codingcode' => 5,
                'is_pl' => 1,
                'isforcesub' => null
            ]
        ]);


        // حساب‌های معین برای دارایی‌های جاری
        DB::table('m_codings')->insert([
            // صندوق (1.1)
            [
                'fk_registrar' => 1,
                'fk_accountingsubgroup' => 11, // صندوق
                'fk_codingtype' => 1,
                'fk_coding' => 1, // دارایی‌های جاری
                'fk_codingnature' => 1,
                'coding' => 'صندوق',
                'codingcode' => 101,
                'is_pl' => 0,
                'isforcesub' => 1
            ],
            // بانک (1.2)
            [
                'fk_registrar' => 1,
                'fk_accountingsubgroup' => 10, // بانک
                'fk_codingtype' => 1,
                'fk_coding' => 1,
                'fk_codingnature' => 1,
                'coding' => 'بانک‌ها',
                'codingcode' => 102,
                'is_pl' => 0,
                'isforcesub' => 1
            ],
            // حساب‌های دریافتنی (1.3)
            [
                'fk_registrar' => 1,
                'fk_accountingsubgroup' => 1, // اشخاص
                'fk_codingtype' => 1,
                'fk_coding' => 1,
                'fk_codingnature' => 1,
                'coding' => 'حساب‌های دریافتنی تجاری',
                'codingcode' => 103,
                'is_pl' => 0,
                'isforcesub' => 1
            ],
            // موجودی کالا (1.4)
            [
                'fk_registrar' => 1,
                'fk_accountingsubgroup' => 12, // انبار
                'fk_codingtype' => 1,
                'fk_coding' => 1,
                'fk_codingnature' => 1,
                'coding' => 'موجودی کالا',
                'codingcode' => 104,
                'is_pl' => 0,
                'isforcesub' => 1
            ]
        ]);

        // حساب‌های معین برای بدهی‌های جاری
        DB::table('m_codings')->insert([
            // حساب‌های پرداختنی (2.1)
            [
                'fk_registrar' => 1,
                'fk_accountingsubgroup' => 1, // اشخاص
                'fk_codingtype' => 2,
                'fk_coding' => 2, // بدهی‌های جاری
                'fk_codingnature' => 2,
                'coding' => 'حساب‌های پرداختنی تجاری',
                'codingcode' => 201,
                'is_pl' => 0,
                'isforcesub' => 1
            ],
            // وام‌های کوتاه مدت (2.2)
            [
                'fk_registrar' => 1,
                'fk_accountingsubgroup' => 10, // بانک
                'fk_codingtype' => 2,
                'fk_coding' => 2,
                'fk_codingnature' => 2,
                'coding' => 'وام‌های کوتاه مدت',
                'codingcode' => 202,
                'is_pl' => 0,
                'isforcesub' => 1
            ]
        ]);

        // حساب‌های معین برای درآمدها
        DB::table('m_codings')->insert([
            // فروش کالا (3.1)
            [
                'fk_registrar' => 1,
                'fk_accountingsubgroup' => 2, // کالا
                'fk_codingtype' => 4,
                'fk_coding' => 3, // درآمدهای عملیاتی
                'fk_codingnature' => 2,
                'coding' => 'فروش کالا',
                'codingcode' => 301,
                'is_pl' => 1,
                'isforcesub' => 1
            ],
            // تخفیفات فروش (3.2)
            [
                'fk_registrar' => 1,
                'fk_accountingsubgroup' => 2, // کالا
                'fk_codingtype' => 4,
                'fk_coding' => 3,
                'fk_codingnature' => 1, // بدهکار (کاهنده درآمد)
                'coding' => 'تخفیفات نقدی فروش',
                'codingcode' => 302,
                'is_pl' => 1,
                'isforcesub' => 1
            ]
        ]);

        // حساب‌های معین برای بهای تمام شده
        DB::table('m_codings')->insert([
            // بهای تمام شده (4.1)
            [
                'fk_registrar' => 1,
                'fk_accountingsubgroup' => 2, // کالا
                'fk_codingtype' => 5,
                'fk_coding' => 4, // بهای تمام شده
                'fk_codingnature' => 1,
                'coding' => 'بهای تمام شده کالای فروش رفته',
                'codingcode' => 401,
                'is_pl' => 1,
                'isforcesub' => 1
            ],
            // برگشت از فروش (4.2)
            [
                'fk_registrar' => 1,
                'fk_accountingsubgroup' => 2, // کالا
                'fk_codingtype' => 5,
                'fk_coding' => 4,
                'fk_codingnature' => 2, // بستانکار (کاهنده بهای تمام شده)
                'coding' => 'برگشت از فروش و تخفیفات',
                'codingcode' => 402,
                'is_pl' => 1,
                'isforcesub' => 1
            ]
        ]);

        // حساب‌های معین برای هزینه‌ها
        DB::table('m_codings')->insert([
            // هزینه‌های فروش (5.1)
            [
                'fk_registrar' => 1,
                'fk_accountingsubgroup' => 6, // مراکز هزینه
                'fk_codingtype' => 6,
                'fk_coding' => 5, // هزینه‌های عملیاتی
                'fk_codingnature' => 1,
                'coding' => 'هزینه‌های فروش',
                'codingcode' => 501,
                'is_pl' => 1,
                'isforcesub' => 1
            ],
            // هزینه‌های اداری (5.2)
            [
                'fk_registrar' => 1,
                'fk_accountingsubgroup' => 6, // مراکز هزینه
                'fk_codingtype' => 6,
                'fk_coding' => 5,
                'fk_codingnature' => 1,
                'coding' => 'هزینه‌های اداری',
                'codingcode' => 502,
                'is_pl' => 1,
                'isforcesub' => 1
            ],
            // هزینه‌های مالی (5.3)
            [
                'fk_registrar' => 1,
                'fk_accountingsubgroup' => 6, // مراکز هزینه
                'fk_codingtype' => 6,
                'fk_coding' => 5,
                'fk_codingnature' => 1,
                'coding' => 'هزینه‌های مالی',
                'codingcode' => 503,
                'is_pl' => 1,
                'isforcesub' => 1
            ],
            // هزینه‌های انبارداری (5.4)
            [
                'fk_registrar' => 1,
                'fk_accountingsubgroup' => 12, // انبار
                'fk_codingtype' => 6,
                'fk_coding' => 5,
                'fk_codingnature' => 1,
                'coding' => 'هزینه‌های انبارداری',
                'codingcode' => 504,
                'is_pl' => 1,
                'isforcesub' => 1
            ]
        ]);
    }
}
