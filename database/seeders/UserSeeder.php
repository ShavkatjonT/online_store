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
        $admin->roles()->attach(1);

        $defaultUser = User::create([
            'first_name' => 'Shavkatjon',
            'last_name' => 'Turimatov',
            'email' => 'test@gmail.com',
            'password' => Hash::make('test'),
            'phone' => '+99890562935',
        ]);
        $defaultUser->roles()->attach(2);

        User::factory()->count(10)->hasAttached([Role::find(2)])->create();
    }
}
