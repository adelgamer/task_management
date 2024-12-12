<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRightsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("rights")->insert(
            [
                [
                    "code" => "add_user",
                    "name_en" => "Add a new user",
                    "name_fr" => "Ajouter un utilisateur"
                ],
                [
                    "code" => "edit_user",
                    "name_en" => "Edit a user",
                    "name_fr" => "Modifier un utilisateur"
                ],
            ]
        );
    }
}
