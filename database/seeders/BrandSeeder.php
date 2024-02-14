<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{

    public function run(): void
    {
        Brand::truncate();

        $brands = [
             ['brand_name'=>'Adidas'],
             [  'brand_name'=>'Nike'],
             ['brand_name'=>'Vans'],
             [ 'brand_name'=>'New balance'],
             [ 'brand_name'=>'Puma'],
             [ 'brand_name'=>'Lacoste'],
             ['brand_name'=>'Converse'],
        ];

        foreach ($brands as $key => $value) {
            Brand::create($value);
        }
    }
}
