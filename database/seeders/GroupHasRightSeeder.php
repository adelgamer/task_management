<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupHasRightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("group_has_rights")->insert([
            // Admin rights
            [
                "right_id" => 1,
                "group_id" => 1,
                "has" => true
            ],
            [
                "right_id" => 2,
                "group_id" => 1,
                "has" => true
            ],
            [
                "right_id" => 3,
                "group_id" => 1,
                "has" => true
            ],
            [
                "right_id" => 4,
                "group_id" => 1,
                "has" => true
            ],
            [
                "right_id" => 5,
                "group_id" => 1,
                "has" => true
            ],

            // Manger rights
            [
                "right_id" => 1,
                "group_id" => 2,
                "has" => true
            ],
            [
                "right_id" => 2,
                "group_id" => 2,
                "has" => true
            ],
            [
                "right_id" => 3,
                "group_id" => 2,
                "has" => true
            ],
            [
                "right_id" => 4,
                "group_id" => 2,
                "has" => true
            ],
            [
                "right_id" => 5,
                "group_id" => 2,
                "has" => true
            ],

            // Emplyee rights
            [
                "right_id" => 1,
                "group_id" => 3,
                "has" => false
            ],
            [
                "right_id" => 2,
                "group_id" => 3,
                "has" => true
            ],
            [
                "right_id" => 3,
                "group_id" => 3,
                "has" => false
            ],
            [
                "right_id" => 4,
                "group_id" => 3,
                "has" => true
            ],
            [
                "right_id" => 5,
                "group_id" => 3,
                "has" => true
            ],
        ]);
    }
}
