<?php

namespace Database\Seeders;

use App\Models\PaymentCardType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentCardTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaymentCardType::create([
            'name' => 'Uzcard',
            'code' => 'uzcard',
            'icon' => 'https://www.spot.uz/media/img/2019/04/fWPk2a15549570282085_b.jpg',

        ]);

        PaymentCardType::create([
            'name' => 'Humo',
            'code' => 'humo',
            'icon' => 'https://humocard.uz/upload/medialibrary/208/8x0p9hi3h9jww0flwdm92dayhn0flulj/humo-logo-more.png',

        ]);

        PaymentCardType::create([
            'name' => 'Visa',
            'code' => 'visa',
            'icon' => 'https://1000logos.net/wp-content/uploads/2021/11/VISA-logo.png',

        ]);
    }
}
