<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
   return [
        'name' => fake()->words(3, true), // اسم منتج مكون من 3 كلمات
        'description' => fake()->paragraph(), // وصف عشوائي
        'price' => fake()->randomFloat(2, 10, 1000), // سعر بين 10 و 1000
        'stock' => fake()->numberBetween(0, 100), // مخزون بين 0 و 100
        'image' => fake()->imageUrl(640, 480, 'products', true), // رابط صورة وهمي
        // إذا كان لديك تصنيفات لاحقاً، يمكنك ربطها بـ category_id
        // 'category_id' => Category::factory(), // يفترض وجود CategoryFactory
    ];

    
    }
}
