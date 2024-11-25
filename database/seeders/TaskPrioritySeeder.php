<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskPrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("task_priority")->insert([
            [
                'name_en' => 'Low',
                'name_fr' => 'Faible',
            ],
            [
                'name_en' => 'Medium',
                'name_fr' => 'Moyenne',
            ],
            [
                'name_en' => 'High',
                'name_fr' => 'Élevée',
            ],
            [
                'name_en' => 'Critical',
                'name_fr' => 'Critique',
            ],
        ]);
    }
}
