<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RightsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("rights")->insert([
            [
                "code" => "add_task",
                "name_en" => "Add a tasks",
                "name_fr" => "Ajouter une tache",
            ],
            [
                "code" => "edit_task",
                "name_en" => "Edit a task",
                "name_fr" => "Modifier une tache"
            ],
            [
                "code" => "delete_task",
                "name_en" => "Delete a task",
                "name_fr" => "Suprimer une tache"
            ],
            [
                "code" => "view_task",
                "name_en" => "View a task",
                "name_fr" => "Voir une tache"
            ],
            [
                "code" => "view_tasks_list",
                "name_en" => "View the tasks list",
                "name_fr" => "Voir la liste des taches"
            ],
        ]);
    }
}
