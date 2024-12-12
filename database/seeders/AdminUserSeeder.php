<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            "name" => "superadmin",
            "family_name" => "superadmin",
            "username" => "superadmin",
            "password" => Hash::make('islamicstate'),
            "email" => 'adelgamer814@gmail.com',
            "status" => 1,
            "group_id" => 1
        ]);
    }
}
