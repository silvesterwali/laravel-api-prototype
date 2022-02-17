<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Apps\HrmLevel;
use App\Models\EmployeeLevel;

class EmployeeLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (HrmLevel::all() as $hrm_level) {
            EmployeeLevel::firstOrCreate(
                ["level_code" => $hrm_level->kd_level],
                ["sorting_number" => $hrm_level->id_level, "level" => $hrm_level->level]
            );
        }
    }
}
