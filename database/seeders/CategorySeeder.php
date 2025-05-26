<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Điện thoại',
                'description' => 'Các loại điện thoại di động và phụ kiện',
            ],
            [
                'name' => 'Laptop',
                'description' => 'Máy tính xách tay và phụ kiện',
            ],
            [
                'name' => 'Máy tính bảng',
                'description' => 'Các loại máy tính bảng và phụ kiện',
            ],
            [
                'name' => 'Phụ kiện',
                'description' => 'Phụ kiện điện thoại, laptop và máy tính bảng',
            ],
            [
                'name' => 'Đồng hồ thông minh',
                'description' => 'Đồng hồ thông minh và phụ kiện',
            ],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'description' => $category['description'],
                'status' => true,
            ]);
        }
    }
}
