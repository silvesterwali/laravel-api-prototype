<?php

namespace Database\Seeders;

use App\Models\Apps\HrmDepartment;
use App\Models\EmployeeDepartment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeDepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (HrmDepartment::all() as $hrm_department) {
            EmployeeDepartment::firstOrCreate([
                "department_code" => $hrm_department->kd_dept
            ], [
                "sorting_number" => $hrm_department->id_dept,
                "department" => $hrm_department->department,
                "description" => $hrm_department->description
            ]);
        }
    }
}
