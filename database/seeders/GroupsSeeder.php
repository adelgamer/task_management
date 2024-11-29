<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("groups")->insert([
            [
                "name_en" => "Admin",
                "name_fr" => "Administrateur",
            ],
            [
                "name_en" => "Manager",
                "name_fr" => "Directeur",
            ],
            [
                "name_en" => "Employee",
                "name_fr" => "Employé",
            ],
        ]);
    }
}
