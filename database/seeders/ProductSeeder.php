<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            // Điện thoại
            [
                'category_id' => Category::where('slug', 'dien-thoai')->first()->id,
                'name' => 'iPhone 15 Pro Max',
                'description' => 'iPhone 15 Pro Max với chip A17 Pro, camera 48MP, màn hình 6.7 inch Super Retina XDR.',
                'original_price' => 34990000,
                'price' => 32990000,
                'stock' => 50,
                'thumbnail' => 'products/iphone-15-pro-max.jpg',
                'status' => 'active',
            ],
            [
                'category_id' => Category::where('slug', 'dien-thoai')->first()->id,
                'name' => 'Samsung Galaxy S24 Ultra',
                'description' => 'Samsung Galaxy S24 Ultra với chip Snapdragon 8 Gen 3, camera 200MP, màn hình 6.8 inch Dynamic AMOLED 2X.',
                'original_price' => 33990000,
                'price' => 31990000,
                'stock' => 45,
                'thumbnail' => 'products/samsung-s24-ultra.jpg',
                'status' => 'active',
            ],
            // Laptop
            [
                'category_id' => Category::where('slug', 'laptop')->first()->id,
                'name' => 'MacBook Pro M3 Pro',
                'description' => 'MacBook Pro với chip M3 Pro, màn hình 14 inch Liquid Retina XDR, RAM 18GB, SSD 512GB.',
                'original_price' => 49990000,
                'price' => 47990000,
                'stock' => 30,
                'thumbnail' => 'products/macbook-pro-m3.jpg',
                'status' => 'active',
            ],
            [
                'category_id' => Category::where('slug', 'laptop')->first()->id,
                'name' => 'Dell XPS 15',
                'description' => 'Dell XPS 15 với CPU Intel Core i9, GPU RTX 4070, màn hình 15.6 inch OLED 4K.',
                'original_price' => 45990000,
                'price' => 43990000,
                'stock' => 25,
                'thumbnail' => 'products/dell-xps-15.jpg',
                'status' => 'active',
            ],
            // Máy tính bảng
            [
                'category_id' => Category::where('slug', 'may-tinh-bang')->first()->id,
                'name' => 'iPad Pro M2',
                'description' => 'iPad Pro với chip M2, màn hình 12.9 inch Liquid Retina XDR, hỗ trợ Apple Pencil 2.',
                'original_price' => 29990000,
                'price' => 27990000,
                'stock' => 40,
                'thumbnail' => 'products/ipad-pro-m2.jpg',
                'status' => 'active',
            ],
            [
                'category_id' => Category::where('slug', 'may-tinh-bang')->first()->id,
                'name' => 'Samsung Galaxy Tab S9 Ultra',
                'description' => 'Samsung Galaxy Tab S9 Ultra với chip Snapdragon 8 Gen 2, màn hình 14.6 inch Super AMOLED.',
                'original_price' => 27990000,
                'price' => 25990000,
                'stock' => 35,
                'thumbnail' => 'products/samsung-tab-s9.jpg',
                'status' => 'active',
            ],
            // Phụ kiện
            [
                'category_id' => Category::where('slug', 'phu-kien')->first()->id,
                'name' => 'AirPods Pro 2',
                'description' => 'AirPods Pro 2 với chip H2, chống ồn chủ động, chống nước IPX4.',
                'original_price' => 7990000,
                'price' => 6990000,
                'stock' => 100,
                'thumbnail' => 'products/airpods-pro-2.jpg',
                'status' => 'active',
            ],
            [
                'category_id' => Category::where('slug', 'phu-kien')->first()->id,
                'name' => 'Samsung 45W Super Fast Charging',
                'description' => 'Củ sạc nhanh Samsung 45W với công nghệ Super Fast Charging 2.0.',
                'original_price' => 1490000,
                'price' => 1290000,
                'stock' => 80,
                'thumbnail' => 'products/samsung-45w-charger.jpg',
                'status' => 'active',
            ],
            // Đồng hồ thông minh
            [
                'category_id' => Category::where('slug', 'dong-ho-thong-minh')->first()->id,
                'name' => 'Apple Watch Series 9',
                'description' => 'Apple Watch Series 9 với chip S9, màn hình Always-On Retina, đo nhịp tim và SpO2.',
                'original_price' => 9990000,
                'price' => 8990000,
                'stock' => 60,
                'thumbnail' => 'products/apple-watch-s9.jpg',
                'status' => 'active',
            ],
            [
                'category_id' => Category::where('slug', 'dong-ho-thong-minh')->first()->id,
                'name' => 'Samsung Galaxy Watch 6 Pro',
                'description' => 'Samsung Galaxy Watch 6 Pro với Wear OS, màn hình 1.4 inch Super AMOLED, đo nhịp tim và huyết áp.',
                'original_price' => 8990000,
                'price' => 7990000,
                'stock' => 55,
                'thumbnail' => 'products/samsung-watch-6.jpg',
                'status' => 'active',
            ],
        ];

        foreach ($products as $product) {
            Product::create([
                'category_id' => $product['category_id'],
                'name' => $product['name'],
                'slug' => Str::slug($product['name']),
                'description' => $product['description'],
                'original_price' => $product['original_price'],
                'price' => $product['price'],
                'stock' => $product['stock'],
                'thumbnail' => $product['thumbnail'],
                'status' => $product['status'],
            ]);
        }
    }
}
