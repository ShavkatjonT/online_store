<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::find(2)->addresses()->create([
            "latitude" => "40.41135665803173",
            "longitude" => "71.21746645261382",
            "region" => "Fergana",
            "district" => "Rishton",
            "street" => "Patki Buloqboshi MFY",
            "home" => "Uzun ko'chasi 21-uy",
        ]);
    }
}
