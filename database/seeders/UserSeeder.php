<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'phone' => '+998901234567',
        ]);
        $admin->assignRole('admin');

        $defaultUser = User::create([
            'first_name' => 'Ali',
            'last_name' => 'Gafarov',
            'email' => 'ali@gmail.com',
            'password' => Hash::make('test'),
            'phone' => '+99890234567',
        ]);
        $defaultUser->assignRole('editor');

        $defaultUser = User::create([
            'first_name' => 'Shavkatjon',
            'last_name' => 'Turimatov',
            'email' => 'test@gmail.com',
            'password' => Hash::make('test'),
            'phone' => '+99890562935',
        ]);

        $defaultUser->assignRole('shop-manager');

        $defaultUser = User::create([
            'first_name' => 'Jonibek',
            'last_name' => 'Adxamov',
            'email' => 'jonibek@gmail.com',
            'password' => Hash::make('test'),
            'phone' => '+998902345621',
        ]);
        $defaultUser->assignRole('customer');

        $defaultUser = User::create([
            'first_name' => 'Zohidjon',
            'last_name' => 'Kamolidinov',
            'email' => 'zohidjon@gmail.com',
            'password' => Hash::make('test'),
            'phone' => '+998907645621',
        ]);
        $defaultUser->assignRole('helpdesk-support');




        $users =  User::factory()->count(10)->create();
        foreach ($users as $user) {
            $user->assignRole('customer');
        }
    }
}
