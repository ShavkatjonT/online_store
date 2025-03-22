<?php

namespace Database\Seeders;

use App\Models\DeliveryMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeliveryMethodSeeder extends Seeder
{

    public function run(): void
    {
        DeliveryMethod::factory()->create([
            'name' => [
                'uz' => 'Tekin',
                'ru' => 'Бесплатно',
            ],
            'sum' => 0,
            'estimated_time' => [
                'uz' => '5 kun',
                'ru' => '5 день',
            ],
        ]);

        DeliveryMethod::factory()->create([
            'name' => [
                'uz' => 'Standart',
                'ru' => 'Стандарт',
            ],
            'sum' => 40000,
            'estimated_time' => [
                'uz' => '3 kun',
                'ru' => '3 день',
            ],
        ]);
        DeliveryMethod::factory()->create([
            'name' => [
                'uz' => 'Tez',
                'ru' => 'Быстро',
            ],
            'sum' => 80000,
            'estimated_time' => [
                'uz' => '1 kun',
                'ru' => '1 день',
            ],
        ]);
    }
}
