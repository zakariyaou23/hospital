<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'Super Admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Patient',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Doctor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nurse',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pharmacist',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Caregiver',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('roles')->insert($roles);


    }
}
