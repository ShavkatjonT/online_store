<?php

namespace Database\Seeders;

use App\Models\Value;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Value::create([
            'attribute_id' => 1,
            'name' => [
                'uz' => 'qizil',
                'ru' => 'красный',
            ],
        ]);
        Value::create([
            'attribute_id' => 1,
            'name' => [
                'uz' => 'yashil',
                'ru' => 'зеленый',
            ]
        ]);
        Value::create([
            'attribute_id' => 1,
            'name' => [
                'uz' => 'ko\'k',
                'ru' => 'синий',
            ]
        ]);


        Value::create([
            'attribute_id' => 3,
            'name' => [
                'uz' => 'kichik',
                'ru' => 'маленький',
            ]
        ]);
        Value::create([
            'attribute_id' => 3,
            'name' => [
                'uz' => 'o\'rta',
                'ru' => 'средний',
            ],
        ]);
        Value::create([
            'attribute_id' => 3,
            'name' => [
                'uz' => 'katta',
                'ru' => 'большой',
            ],
        ]);


        Value::create([
            'attribute_id' => 2,
            'name' => [
                'uz' => 'paxta',
                'ru' => 'хлопок',
            ],
        ]);
        Value::create([
            'attribute_id' => 2,
            'name' => [
                'uz' => 'poliester',
                'ru' => 'полиэстер',
            ],
        ]);
        Value::create([
            'attribute_id' => 2,
            'name' => [
                'uz' => 'ipek',
                'ru' => 'шелк',
            ],
        ]);
        
    }
}
