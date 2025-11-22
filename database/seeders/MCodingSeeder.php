<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MCodingsSeeder extends Seeder
{
    public function run()
    {
        $registrarId = 1; // کاربری که ثبت می‌کند

        // Nature: 1 = Debtor (بدهکار), 2 = Creditor (بستانکار)
        // Subgroups: 1 = دارایی, 2 = بدهی, 3 = سرمایه, 4 = درآمد, 5 = هزینه

        $codings = [
            // ---------------------------
            // گروه‌ها (Level 1)
            // ---------------------------
            [
                'fk_registrar' => $registrarId,
                'fk_accountingsubgroup' => 1,
                'fk_codingnature' => 1,
                'coding' => 'دارایی‌ها',
                'codingcode' => 1000,
                'is_pl' => 0,
                'isforcesub' => 0,
            ],
            [
                'fk_registrar' => $registrarId,
                'fk_accountingsubgroup' => 2,
                'fk_codingnature' => 2,
                'coding' => 'بدهی‌ها',
                'codingcode' => 2000,
                'is_pl' => 0,
            ],
            [
                'fk_registrar' => $registrarId,
                'fk_accountingsubgroup' => 3,
                'fk_codingnature' => 2,
                'coding' => 'سرمایه',
                'codingcode' => 3000,
                'is_pl' => 0,
            ],
            [
                'fk_registrar' => $registrarId,
                'fk_accountingsubgroup' => 4,
                'fk_codingnature' => 2,
                'coding' => 'درآمدها',
                'codingcode' => 4000,
                'is_pl' => 1,
            ],
            [
                'fk_registrar' => $registrarId,
                'fk_accountingsubgroup' => 5,
                'fk_codingnature' => 1,
                'coding' => 'هزینه‌ها',
                'codingcode' => 5000,
                'is_pl' => 1,
            ],

            // ---------------------------
            // کل‌ها (Level 2)
            // ---------------------------
            // دارایی‌ها
            [
                'fk_registrar' => $registrarId,
                'fk_accountingsubgroup' => 1,
                'fk_codingnature' => 1,
                'fk_coding' => 1, // دارایی‌ها
                'coding' => 'صندوق و بانک',
                'codingcode' => 1100,
                'is_pl' => 0,
            ],
            [
                'fk_registrar' => $registrarId,
                'fk_accountingsubgroup' => 1,
                'fk_codingnature' => 1,
                'fk_coding' => 1,
                'coding' => 'موجودی کالا',
                'codingcode' => 1200,
                'is_pl' => 0,
            ],
            // بدهی‌ها
            [
                'fk_registrar' => $registrarId,
                'fk_accountingsubgroup' => 2,
                'fk_codingnature' => 2,
                'fk_coding' => 2, // بدهی‌ها
                'coding' => 'حساب‌های پرداختنی',
                'codingcode' => 2100,
                'is_pl' => 0,
            ],
            // درآمدها
            [
                'fk_registrar' => $registrarId,
                'fk_accountingsubgroup' => 4,
                'fk_codingnature' => 2,
                'fk_coding' => 4, // درآمدها
                'coding' => 'فروش کالا',
                'codingcode' => 4100,
                'is_pl' => 1,
            ],
            // هزینه‌ها
            [
                'fk_registrar' => $registrarId,
                'fk_accountingsubgroup' => 5,
                'fk_codingnature' => 1,
                'fk_coding' => 5, // هزینه‌ها
                'coding' => 'هزینه خرید کالا',
                'codingcode' => 5100,
                'is_pl' => 1,
            ],
            [
                'fk_registrar' => $registrarId,
                'fk_accountingsubgroup' => 5,
                'fk_codingnature' => 1,
                'fk_coding' => 5, // هزینه‌ها
                'coding' => 'هزینه‌های عمومی و اداری',
                'codingcode' => 5200,
                'is_pl' => 1,
            ],
        ];

        DB::table('m_codings')->insert($codings);
    }
}
