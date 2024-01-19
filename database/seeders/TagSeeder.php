<?php

namespace Database\Seeders;

use App\Models\Tags;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{

    public function run(): void
    {
        Tags::truncate();
        $cats = [
            ['tag_name' => 'ახალი კოლექცია'],
            ['tag_name' => 'მარაგშია'],
            ['tag_name' => 'არ არის მარაგში'],
            ['tag_name' => 'ფასდაკლება'],
        ];

        foreach ($cats as $key => $value) {
            Tags::create($value);
        }
    }
}
