<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

use App\Models\r_menusapi;

class RMenusapiSeeder extends Seeder
{

    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $menuApis = [
            [
                "fk_menu" => 1,
                "apis" => [120101, 120102, 120103, 120104, 120105, 120106, 120107]
            ],
            [
                "fk_menu" => 4,
                "apis" => []
            ],
            [
                "fk_menu" => 7,
                "apis" => []
            ],
            [
                "fk_menu" => 10,
                "apis" => []
            ],
            [
                "fk_menu" => 13,
                "apis" => []
            ],
            [
                "fk_menu" => 18,
                "apis" => []
            ],
            [
                "fk_menu" => 21,
                "apis" => []
            ],
            [
                "fk_menu" => 22,
                "apis" => []
            ],
            [
                "fk_menu" => 23,
                "apis" => [120103, 120104, 120115]
            ],
            [
                "fk_menu" => 24,
                "apis" => [120105, 120106, 120107]
            ],
            [
                "fk_menu" => 32,
                "apis" => [120135]
            ],
            [
                "fk_menu" => 57,
                "apis" => [120301, 120302, 120303, 120304, 120305, 120306, 120307, 120308, 120309, 120310, 120311, 120312, 120313, 120314, 120315, 120316, 120317, 120318, 120319, 120320, 120321, 120322, 120323, 120324, 120325, 120326]
            ],
            [
                "fk_menu" => 67,
                "apis" => [130101, 130102]
            ],
            [
                "fk_menu" => 72,
                "apis" => [120139, 120140, 130101]
            ],
            [
                "fk_menu" => 42,
                "apis" => [120151]
            ],
            [
                "fk_menu" => 73,
                "apis" => [120201, 120202, 120203, 120204, 120205, 120206]
            ],
            [
                "fk_menu" => 47,
                "apis" => [120157]
            ],
            [
                "fk_menu" => 75,
                "apis" => [120157, 120170]
            ],
            [
                "fk_menu" => 55,
                "apis" => [120105]
            ],
            [
                "fk_menu" => 77,
                "apis" => [120153, 120159, 120175]
            ],
            [
                "fk_menu" => 2,
                "apis" => [120101, 120102, 120104, 120105, 120106, 120107, 120156, 120161, 120166, 120167, 120177, 120178]
            ],
            [
                "fk_menu" => 78,
                "apis" => [11010101, 11010128, 11010133, 11010134, 11010135]
            ],
            [
                "fk_menu" => 64,
                "apis" => [11010101, 11010134, 11010133, 11010135, 11010136]
            ],
            [
                "fk_menu" => 65,
                "apis" => [11010137, 11010138, 11010139, 11010140]
            ],
            [
                "fk_menu" => 79,
                "apis" => [120162, 120163, 120164, 120165]
            ],
            [
                "fk_menu" => 53,
                "apis" => [120174]
            ],
            [
                "fk_menu" => 41,
                "apis" => [120169]
            ],
            [
                "fk_menu" => 81,
                "apis" => [120131, 120171]
            ],
            [
                "fk_menu" => 14,
                "apis" => [11010108]
            ],
            [
                "fk_menu" => 17,
                "apis" => [11010141]
            ],
            [
                "fk_menu" => 20,
                "apis" => [11010145]
            ],
            [
                "fk_menu" => 111,
                "apis" => [11010305, 11010152, 11010153]
            ],
            [
                "fk_menu" => 108,
                "apis" => [11010310, 11010153]
            ],
            [
                "fk_menu" => 114,
                "apis" => [11010315, 11010153]
            ],

            [
                "fk_menu" => 132,
                "apis" => [130111]
            ],
            [
                "fk_menu" => 134,
                "apis" => [130112, 130113]
            ],
            [
                "fk_menu" => 136,
                "apis" => [120179]
            ],
            [
                "fk_menu" => 83,
                "apis" => [120182]
            ],
            [
                "fk_menu" => 82,
                "apis" => [120182]
            ],
            [
                "fk_menu" => 145,
                "apis" => [120183]
            ],
        ];

        foreach ($menuApis as $menuApi) {
            $fk_menu = $menuApi['fk_menu'];
            foreach ($menuApi['apis'] as $fk_api) {
                r_menusapi::firstOrCreate(
                    [
                        'fk_menu' => $fk_menu,
                        'fk_api' => $fk_api
                    ],
                    [
                        'created_at' => now(),
                        'updated_at' => now()
                    ]
                );
            }
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
