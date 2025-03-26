<?php

namespace Database\Seeders;

use App\Enums\SettingType;
use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $setting = Setting::create([
            "name" => [
                'uz' => 'Til',
                'ru' => 'Язык',
            ],
            'type' => SettingType::SELECT->value,
        ]);

        $setting->values()->create([
            'name' => [
                'uz' => "O'zbekcha",
                'ru' => "Узбекский"
            ]
        ]);
        $setting->values()->create([
            'name' => [
                'uz' => "Rustcha",
                'ru' => "Русский"
            ]
        ]);


        $setting = Setting::create([
            "name" => [
                'uz' => 'Pul birligi',
                'ru' => 'Валюта',
            ],
            'type' => SettingType::SELECT->value,
        ]);

        $setting->values()->create([
            'name' => [
                'uz' => "So'm",
                'ru' => "Сом"
            ]
        ]);
        $setting->values()->create([
            'name' => [
                'uz' => "Do'lir",
                'ru' => "Доллар"
            ]
        ]);

        Setting::create([
            "name" => [
                'uz' => 'Dark Mode',
                'ru' => 'Темный режим',
            ],
            'type' => SettingType::SWITCH->value,
        ]);

        Setting::create([
            "name" => [
                'uz' => 'Xabarnomalar',
                'ru' => 'Уведомления',
            ],
            'type' => SettingType::SWITCH->value,
        ]);
    }
}
