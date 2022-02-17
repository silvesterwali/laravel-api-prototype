<?php

namespace Database\Seeders;

use App\Models\Apps\HrmAgama;
use App\Models\EmployeeReligion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (HrmAgama::all() as $agama) {
            EmployeeReligion::firstOrCreate([
                "religion" => $agama->agama
            ], [
                "religion" => $agama->agama
            ]);
        }
    }
}
