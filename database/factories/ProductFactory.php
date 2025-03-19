<?php

namespace Database\Factories;

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
    public function definition(): array
    {
        return [
            'category_id' => rand(1, 5),
            'name' => [
                'uz' => fake()->sentence(3),
                'ru' => 'Привет, мир!'
            ],
            'description' => [
                'uz' => fake()->sentence(5),
                'ru' => 'Привет, мир! Это мой первый код на Rus. Я изучаю этот язык программирования. Rus — быстрый, безопасный и современный язык!'
            ],
            'price' => rand(50000, 10000000),

        ];
    }
}
