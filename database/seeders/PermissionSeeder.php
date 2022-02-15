<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * - Create Spatie permission
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                "name" => "Create User",
                "module" => "Human Resource",
                "description" => "Permission to create new user and employee data"
            ],
            [
                "name" => "Edit User",
                "module" => "Human Resource",
                "description" => "Permission to edit user and employee data"
            ],
            [
                "name" => "Create Permission",
                "module" => "IT Development",
                "description" => "Permission to create new spatie permission"
            ],
            [
                "name" => "Give Permission",
                "module" => "IT Development",
                "description" => "Permission to enable user to give permission (spatie) to user"
            ],
            [
                "name" => "Revoke Permission",
                "module" => "IT Development",
                "description" => "Permission to enable user to revoke given permission (spatie) to user"
            ],

        ];
        foreach ($permissions as $permission) {
            /**
             * existing permission will be updated 
             * 
             */
            Permission::updateOrCreate([
                "name" => $permission["name"],
            ], [
                "module" => $permission["module"],
                "description" => $permission["description"]
            ]);
        }
    }
}
