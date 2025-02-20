<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'iamluca137',
            'avatar' => 'z5065557836243_d8917957648f6fea7694fbb17f1c5c81.jpg',
            'email' => 'lv.thanh137@gmail.com',
            'password' => bcrypt('lv.thanh137@gmail.com'),
        ]);
    }
}
