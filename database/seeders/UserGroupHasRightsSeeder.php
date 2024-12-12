<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserGroupHasRightsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("group_has_rights")->insert([
            // Admin rights
            [
                "right_id" => 6,
                "group_id" => 1,
                "has" => true
            ],
            [
                "right_id" => 7,
                "group_id" => 1,
                "has" => true
            ],
            // Manger rights
            [
                "right_id" => 6,
                "group_id" => 2,
                "has" => true
            ],
            [
                "right_id" => 7,
                "group_id" => 2,
                "has" => true
            ],

            // Emplyee rights
            [
                "right_id" => 6,
                "group_id" => 3,
                "has" => false
            ],
            [
                "right_id" => 7,
                "group_id" => 3,
                "has" => false
            ],
        ]);
    }
}
