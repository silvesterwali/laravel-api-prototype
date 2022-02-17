<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Apps\HrmPosition;
use App\Models\EmployeePosition;

class EmployeePositionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (HrmPosition::all() as $position) {
            EmployeePosition::firstOrCreate([
                "position_code" => $position->kd_pos
            ], [
                "sorting_number" => $position->id_pos,
                "position" => $position->position,
                "description" => $position->description
            ]);
        }
    }
}
