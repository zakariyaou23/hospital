<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regions = [
            //id = 1
            [
                'name' => 'Adamawa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 2
            [
                'name' => 'Centre',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 3
            [
                'name' => 'East',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 4
            [
                'name' => 'Far North',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 5
            [
                'name' => 'Littoral',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 6
            [
                'name' => 'North',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 7
            [
                'name' => 'North West',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 8
            [
                'name' => 'South',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 9
            [
                'name' => 'South West',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //id = 10
            [
                'name' => 'West',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];
        DB::table('regions')->insert($regions);
    }
}
