<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            'first_name' => 'Aissatou Awal',
            'role_id' => 1,
            'email' => 'aissa@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'telephone' => '693348077',
            'date_of_birth' => '2003-04-15',
            'gender' => 'Female',
            'created_at' => now(),
            'updated_at' => now()
        ];

        $departments = [
            [
                'name' => 'Cardioloy',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Neurology',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Hepatology',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Pediatry',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        DB::table('users')->insert($admin);
        DB::table('departments')->insert($departments);
    }
}
