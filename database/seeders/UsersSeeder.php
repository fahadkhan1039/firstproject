<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Muhammad Fahad',
            'email' => 'fahad@gmail.com',
            'password' => bcrypt('Fa'),
            'phone' => '1234567890'
        ]);
    }
}
