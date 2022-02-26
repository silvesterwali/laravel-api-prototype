<?php

namespace Database\Seeders;

use App\Models\Apps\HrmPendidikan;
use App\Models\EmployeeEducation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeEducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (HrmPendidikan::get() as $pendidikan) {
            EmployeeEducation::updateOrCreate([
                "education_code" => $pendidikan->kd_pend
            ], [
                "education" => $pendidikan->keterangan
            ]);
        }
    }
}
