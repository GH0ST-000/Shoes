<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{

    public function run(): void
    {
       Size::truncate();

        $cats = [
            ['size' => '36'],
            ['size' => '37'],
            ['size' => '38'],
            ['size' => '39'],
            ['size' => '40'],
            ['size' => '41'],
            ['size' => '42'],
            ['size' => '43'],
            ['size' => '44'],
            ['size' => '45'],
            ['size' => '46'],

        ];

        foreach ($cats as $key => $value) {
            Size::create($value);
        }
    }
}
