<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("task_status")->insert([
            [
                'name_en' => 'New',
                'name_fr' => 'Nouveau',
            ],
            [
                'name_en' => 'Pending',
                'name_fr' => 'En attente',
            ],
            [
                'name_en' => 'Scheduled',
                'name_fr' => 'Planifié',
            ],
            [
                'name_en' => 'In Progress',
                'name_fr' => 'En cours',
            ],
            [
                'name_en' => 'Blocked',
                'name_fr' => 'Bloqué',
            ],
            [
                'name_en' => 'Waiting for Review',
                'name_fr' => 'En attente de révision',
            ],
            [
                'name_en' => 'Completed',
                'name_fr' => 'Terminé',
            ],
            // [
            //     'name_en' => 'Cancelled',
            //     'name_fr' => 'Annulé',
            // ],
            // [
            //     'name_en' => 'Failed',
            //     'name_fr' => 'Échoué',
            // ],
            // [
            //     'name_en' => 'Archived',
            //     'name_fr' => 'Archivé',
            // ]
        ]);
    }
}
