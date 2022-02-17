<?php

namespace Database\Seeders;

use App\Models\Apps\HrmDivision;
use App\Models\EmployeeDivision;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeDivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (HrmDivision::all() as $hrm_division) {
            EmployeeDivision::firstOrCreate([
                "division_code" => $hrm_division->kd_div,
            ], [
                "sorting_number" => $hrm_division->id_div,
                "division" => $hrm_division->division,
                "description" => $hrm_division->description
            ]);
        }
    }
}
