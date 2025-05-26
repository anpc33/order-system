<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Product::class;
    public function definition(): array
    {
        $name = $this->faker->words(3, true);
        return [
            'category_id' => Category::inRandomOrder()->first()->id,
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->paragraph(),
            'original_price' => $this->faker->randomFloat(2, 200, 400),
            'price' => $this->faker->randomFloat(2, 100, 300),
            'stock' => $this->faker->numberBetween(10, 50),
            'thumbnail' => $this->faker->imageUrl(400, 300, 'products', true, 'Product'),
            'status' => 'active',
        ];
    }
}
