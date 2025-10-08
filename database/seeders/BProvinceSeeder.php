<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class BProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('b_provinces')->insert([
            ['pk_province' => 1, 'fk_registrar' => 1, 'province' => 'تهران', 'created_at' => now(), 'updated_at' => now()],
            ['pk_province' => 2, 'fk_registrar' => 1, 'province' => 'اصفهان', 'created_at' => now(), 'updated_at' => now()],
            ['pk_province' => 3, 'fk_registrar' => 1, 'province' => 'خراسان رضوی', 'created_at' => now(), 'updated_at' => now()],
            ['pk_province' => 4, 'fk_registrar' => 1, 'province' => 'فارس', 'created_at' => now(), 'updated_at' => now()],
            ['pk_province' => 5, 'fk_registrar' => 1, 'province' => 'البرز', 'created_at' => now(), 'updated_at' => now()],
            ['pk_province' => 6, 'fk_registrar' => 1, 'province' => 'قزوین', 'created_at' => now(), 'updated_at' => now()],
            ['pk_province' => 7, 'fk_registrar' => 1, 'province' => 'مازندران', 'created_at' => now(), 'updated_at' => now()],
            ['pk_province' => 8, 'fk_registrar' => 1, 'province' => 'گیلان', 'created_at' => now(), 'updated_at' => now()],
            ['pk_province' => 9, 'fk_registrar' => 1, 'province' => 'آذربایجان شرقی', 'created_at' => now(), 'updated_at' => now()],
            ['pk_province' => 10, 'fk_registrar' => 1, 'province' => 'آذربایجان غربی', 'created_at' => now(), 'updated_at' => now()],
            ['pk_province' => 11, 'fk_registrar' => 1, 'province' => 'کردستان', 'created_at' => now(), 'updated_at' => now()],
            ['pk_province' => 12, 'fk_registrar' => 1, 'province' => 'کرمان', 'created_at' => now(), 'updated_at' => now()],
            ['pk_province' => 13, 'fk_registrar' => 1, 'province' => 'کرمانشاه', 'created_at' => now(), 'updated_at' => now()],
            ['pk_province' => 14, 'fk_registrar' => 1, 'province' => 'لرستان', 'created_at' => now(), 'updated_at' => now()],
            ['pk_province' => 15, 'fk_registrar' => 1, 'province' => 'خوزستان', 'created_at' => now(), 'updated_at' => now()],
            ['pk_province' => 16, 'fk_registrar' => 1, 'province' => 'همدان', 'created_at' => now(), 'updated_at' => now()],
            ['pk_province' => 17, 'fk_registrar' => 1, 'province' => 'زنجان', 'created_at' => now(), 'updated_at' => now()],
            ['pk_province' => 18, 'fk_registrar' => 1, 'province' => 'سیستان و بلوچستان', 'created_at' => now(), 'updated_at' => now()],
            ['pk_province' => 19, 'fk_registrar' => 1, 'province' => 'هرمزگان', 'created_at' => now(), 'updated_at' => now()],
            ['pk_province' => 20, 'fk_registrar' => 1, 'province' => 'چهارمحال و بختیاری', 'created_at' => now(), 'updated_at' => now()],
            ['pk_province' => 21, 'fk_registrar' => 1, 'province' => 'بوشهر', 'created_at' => now(), 'updated_at' => now()],
            ['pk_province' => 22, 'fk_registrar' => 1, 'province' => 'کهگیلویه و بویراحمد', 'created_at' => now(), 'updated_at' => now()],
            ['pk_province' => 23, 'fk_registrar' => 1, 'province' => 'اردبیل', 'created_at' => now(), 'updated_at' => now()],
            ['pk_province' => 24, 'fk_registrar' => 1, 'province' => 'قم', 'created_at' => now(), 'updated_at' => now()],
            ['pk_province' => 25, 'fk_registrar' => 1, 'province' => 'ایلام', 'created_at' => now(), 'updated_at' => now()],
            ['pk_province' => 26, 'fk_registrar' => 1, 'province' => 'خراسان شمالی', 'created_at' => now(), 'updated_at' => now()],
            ['pk_province' => 27, 'fk_registrar' => 1, 'province' => 'خراسان جنوبی', 'created_at' => now(), 'updated_at' => now()],
            ['pk_province' => 28, 'fk_registrar' => 1, 'province' => 'سمنان', 'created_at' => now(), 'updated_at' => now()],
            ['pk_province' => 29, 'fk_registrar' => 1, 'province' => 'مرکزی', 'created_at' => now(), 'updated_at' => now()],
            ['pk_province' => 30, 'fk_registrar' => 1, 'province' => 'گلستان', 'created_at' => now(), 'updated_at' => now()],
            ['pk_province' => 31, 'fk_registrar' => 1, 'province' => 'یزد', 'created_at' => now(), 'updated_at' => now()]
        ]);
    }
}
