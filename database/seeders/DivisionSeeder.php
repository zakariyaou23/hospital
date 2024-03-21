<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $divisions = [
            //id = 1
            [
                'name' => 'Djérem',
                'region_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 2
            [
                'name' => 'Faro-et-Déo',
                'region_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 3
            [
                'name' => 'Mayo-Banyo',
                'region_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 4
            [
                'name' => 'Mbéré',
                'region_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 5
            [
                'name' => 'Vina',
                'region_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 6
            [
                'name' => 'Haute-Sanaga',
                'region_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 7
            [
                'name' => 'Lekié',
                'region_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // id = 8
            [
                'name' => 'Mbam-et-Inoubou',
                'region_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // id = 9
            [
                'name' => 'Mbam-et-Kim',
                'region_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 10
            [
                'name' => 'Méfou-et-Afamba',
                'region_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 11
            [
                'name' => 'Méfou-et-Akono',
                'region_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 12
            [
                'name' => 'Mfoundi',
                'region_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 13
            [
                'name' => 'Nyong-et-Kéllé',
                'region_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 14
            [
                'name' => 'Nyong-et-Mfoumou',
                'region_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 15
            [
                'name' => 'Nyong-et-So\'o',
                'region_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 16
            [
                'name' => 'Boumba-et-Ngoko',
                'region_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 17
            [
                'name' => 'Haut-Nyong',
                'region_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 18
            [
                'name' => 'Kadey',
                'region_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 19
            [
                'name' => 'Lom-et-Djerem',
                'region_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 20
            [
                'name' => 'Diamaré',
                'region_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 21
            [
                'name' => 'Logone-et-Chari',
                'region_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 22
            [
                'name' => 'Mayo-Danay',
                'region_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 23
            [
                'name' => 'Mayo-Kani',
                'region_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 24
            [
                'name' => 'Mayo-Sava',
                'region_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 25
            [
                'name' => 'Mayo-Tsanaga',
                'region_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 26
            [
                'name' => 'Moungo',
                'region_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 27
            [
                'name' => 'Nkam',
                'region_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 28
            [
                'name' => 'Sanaga-Maritime',
                'region_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 29
            [
                'name' => 'Wouri',
                'region_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 30
            [
                'name' => 'Bénoué',
                'region_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 31
            [
                'name' => 'Faro',
                'region_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 32
            [
                'name' => 'Mayo-Louti',
                'region_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 33
            [
                'name' => 'Mayo-Rey',
                'region_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 34
            [
                'name' => 'Boyo',
                'region_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 35
            [
                'name' => 'Bui',
                'region_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 36
            [
                'name' => 'Donga-Mantung',
                'region_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 37
            [
                'name' => 'Menchum',
                'region_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // id = 38
            [
                'name' => 'Mezam',
                'region_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 39
            [
                'name' => 'Momo',
                'region_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 40
            [
                'name' => 'Ngo-Ketunjia',
                'region_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 41
            [
                'name' => 'Dja-et-Lobo',
                'region_id' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 42
            [
                'name' => 'Mvila',
                'region_id' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 43
            [
                'name' => 'Océan',
                'region_id' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 44
            [
                'name' => 'Vallée-du-Ntem',
                'region_id' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 45
            [
                'name' => 'Fako',
                'region_id' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 46
            [
                'name' => 'Koupé-Manengouba',
                'region_id' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 47
            [
                'name' => 'Lebialem',
                'region_id' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 48
            [
                'name' => 'Manyu',
                'region_id' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 49
            [
                'name' => 'Meme',
                'region_id' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 50
            [
                'name' => 'Ndian',
                'region_id' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 51
            [
                'name' => 'Bamboutos',
                'region_id' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 52
            [
                'name' => 'Haut-Nkam',
                'region_id' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 53
            [
                'name' => 'Hauts-Plateaux',
                'region_id' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 54
            [
                'name' => 'Koung-Khi',
                'region_id' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 55
            [
                'name' => 'Menoua',
                'region_id' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 56
            [
                'name' => 'Mifi',
                'region_id' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 57
            [
                'name' => 'Ndé',
                'region_id' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 58
            [
                'name' => 'Noun',
                'region_id' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        DB::table('divisions')->insert($divisions);
    }
}
