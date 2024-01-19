<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{

    public function run(): void
    {
        Category::truncate();
        $cats = [
            ['category_name' => 'კაცი'],
            ['category_name' => 'ქალი'],
            ['category_name' => 'ბავშვი'],
        ];

        foreach ($cats as $key => $value) {
            Category::create($value);
        }
    }
}
