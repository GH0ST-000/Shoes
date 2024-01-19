<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            TagSeeder::class,
            SizeSeeder::class,
            BrandSeeder::class,
            UserSeeder::class
        ]);
    }
}
