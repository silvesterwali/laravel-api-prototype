<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Apps\Tusers;
use App\Models\User;
use App\Models\UserTelegram;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Tusers::all() as $userFromApps) {
            $user = User::updateOrCreate([
                "username" => $userFromApps->username,
            ], [
                "email" => $userFromApps->email == 'demoakun@pt-saa.comxxx' ? $userFromApps->username . '@pt-saa.com' : $userFromApps->email,
                "role" => $userFromApps->role,
                "user_group" => $userFromApps->usergroup,
                "is_active" => $userFromApps->status,
                "password" => Hash::make('rahasia'),
                "created_at" => date('Y-m-d H:i:s', strtotime($userFromApps->reg_date))
            ]);
            if ($user && $userFromApps->telegram_id) {
                UserTelegram::updateOrCreate([
                    "user_id" => $user->id,
                ], [
                    "telegrams" => $userFromApps->telegram_id
                ]);
            }
        }
    }
}
