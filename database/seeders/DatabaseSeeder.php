<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $electronics = Category::create(['name' => 'electronics']);
        $jewelery = Category::create(['name' => 'jewelery']);

        Product::insert([
            [
                'title' => 'Smartphone',
                'description' => 'Latest smartphone model',
                'price' => 499.99,
                'category_id' => $electronics->id,
                'image' => 'https://via.placeholder.com/150',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Gold Necklace',
                'description' => 'Beautiful gold necklace',
                'price' => 899.99,
                'category_id' => $jewelery->id,
                'image' => 'https://via.placeholder.com/150',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}

