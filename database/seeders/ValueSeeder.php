<?php

namespace Database\Seeders;

use App\Models\Attribute;
use Illuminate\Database\Seeder;

class ValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $attribute = Attribute::find(1);
        $attribute->values()->create([
            'name' => [
                'uz' => 'qizil',
                'ru' => 'красный',
            ],
        ]);
        $attribute->values()->create([
            'name' => [
                'uz' => 'yashil',
                'ru' => 'зеленый',
            ]
        ]);
        $attribute->values()->create([
            'name' => [
                'uz' => 'ko\'k',
                'ru' => 'синий',
            ]
        ]);


        $attribute = Attribute::find(2);
        $attribute->values()->create([
            'name' => [
                'uz' => 'kichik',
                'ru' => 'маленький',
            ]
        ]);
        $attribute->values()->create([
            'name' => [
                'uz' => 'o\'rta',
                'ru' => 'средний',
            ],
        ]);
        $attribute->values()->create([
            'name' => [
                'uz' => 'katta',
                'ru' => 'большой',
            ],
        ]);


        $attribute = Attribute::find(3);
        $attribute->values()->create([
            'name' => [
                'uz' => 'paxta',
                'ru' => 'хлопок',
            ],
        ]);
        $attribute->values()->create([
            'name' => [
                'uz' => 'poliester',
                'ru' => 'полиэстер',
            ],
        ]);
        $attribute->values()->create([
            'name' => [
                'uz' => 'ipek',
                'ru' => 'шелк',
            ],
        ]);
    }
}
