<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => [
                'uz' => 'Stol',
                'ru' => 'Стол',
            ]
        ]);




        Category::create([
            'name' => [
                'uz' => 'Divan',
                'ru' => 'Диван',
            ]
        ]);

        $category = Category::create([
            'name' => [
                'uz' => 'Kreslo',
                'ru' => 'Кресло',
            ]
        ]);


        $category->childCategories()->create([
            'name' => [
                'uz' => 'Offis',
                'ru' => 'Офис',
            ]
        ]);

        $category->childCategories()->create([
            'name' => [
                'uz' => 'Yumshoq',
                'ru' => 'Мягкий',
            ]
        ]);

        $childCategoriey = $category->childCategories()->create([
            'name' => [
                'uz' => 'Gaming',
                'ru' => 'Игровой',
            ]
        ]);

        $childCategoriey->childCategories()->create(
            [
                'name' => [
                    'uz' => 'RGB',
                    'ru' => 'RGB',
                ]
            ]
        );


        $childCategoriey->childCategories()->create(
            [
                'name' => [
                    'uz' => 'Qora',
                    'ru' => 'Черный',
                ]
            ]
        );

        $childCategoriey->childCategories()->create(
            [
                'name' => [
                    'uz' => 'Pushti',
                    'ru' => 'Розовый',
                ]
            ]
        );

        $childCategoriey->childCategories()->create(
            [
                'name' => [
                    'uz' => 'Oq',
                    'ru' => 'Белый',
                ]
            ]
        );



        Category::create([
            'name' => [
                'uz' => 'Yotoq',
                'ru' => 'Ётак',
            ]
        ]);

        Category::create([
            'name' => [
                'uz' => 'Stul',
                'ru' => 'Стул',
            ]
        ]);
    }
}
