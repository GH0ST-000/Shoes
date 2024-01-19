<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    public function run(): void
    {
        User::truncate();
        User::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>\Hash::make('1qaz!QAZ'),
            'role'=>'admin'
        ]);
    }
}
