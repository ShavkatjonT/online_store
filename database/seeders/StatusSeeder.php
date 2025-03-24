<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::create([
            'name' => [
                "uz" => "Yangi",
                "ru" => "Новый"
            ],
            "code" => "new",
            'for' => "order",
        ]);

        Status::create([
            'name' => [
                "uz" => "Tastiqlandi",
                "ru" => "Одобренный"
            ],
            "code" => "confirmed",
            'for' => "order",
        ]);
        Status::create([
            'name' => [
                "uz" => "Ishlanyapti",
                "ru" => "Оно работает."
            ],
            "code" => "processing",
            'for' => "order",
        ]);
        Status::create([
            'name' => [
                "uz" => "Yetkazib berilyapti",
                "ru" => "Доставка."
            ],
            "code" => "shippeng",
            'for' => "order",
        ]);

        Status::create([
            'name' => [
                "uz" => "Yetkazib berildi",
                "ru" => "Доставленный."
            ],
            "code" => "delivered",
            'for' => "order",
        ]);

        Status::create([
            'name' => [
                "uz" => "Tugatildi",
                "ru" => "Законченный"
            ],
            "code" => "completed",
            'for' => "order",
        ]);

        Status::create([
            'name' => [
                "uz" => "Yopildi",
                "ru" => "Закрыто"
            ],
            "code" => "closed",
            'for' => "order",
        ]);

        Status::create([
            'name' => [
                "uz" => "Bekor qilindi",
                "ru" => "Отменено"
            ],
            "code" => "canceled",
            'for' => "order",
        ]);

        Status::create([
            'name' => [
                "uz" => "Qaytarib berildi",
                "ru" => "Возвращено"
            ],
            "code" => "refounded",
            'for' => "order",
        ]);

        Status::create([
            'name' => [
                "uz" => "To'lov kutulmoqda",
                "ru" => "Ожидается оплата."
            ],
            "code" => "waiting_payment",
            'for' => "order",
        ]);

        Status::create([
            'name' => [
                "uz" => "To'landi",
                "ru" => "Оплаченный."
            ],
            "code" => "paid",
            'for' => "order",
        ]);

        Status::create([
            'name' => [
                "uz" => "To'lovda Xato ",
                "ru" => "Ошибка платежа."
            ],
            "code" => "paymend_error    ",
            'for' => "order",
        ]);
    }
}
