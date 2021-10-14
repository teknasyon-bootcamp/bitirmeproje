<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Spor Haberleri',
                'image' => 'test',
            ],
            [
                'name' => 'Siyasi Haberler',
                'image' => 'test',
            ],
            [
                'name' => 'Doga Haberleri',
                'image' => 'test',
            ],
            [
                'name' => 'Teknoloji Haberleri',
                'image' => 'test',
            ],
        ];

        foreach ($categories as $category) Category::firstOrCreate([
            'name' => $category['name'],
            'image' => $category['image'],
            'key' => Str::slug($category['name']),
        ]);
    }
}
