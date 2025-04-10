<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(

            ['email' => 'test@seel.io'],
            [
                'name' => 'seel_user',
                'password' => Hash::make('seel_password'),
            ]
        );
    }
}
