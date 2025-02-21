<?php

namespace Database\Seeders;

use App\Models\CatCalendar;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CatCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('id', 1)->first();

        $data = [
            [
                'user_id' => $user->id,
                'code' => $user->username . '-' . Str::slug('Personal'),
                'name' => 'Personal',
                'description' => null,
                'color' => '#008000',
                'order' => 0,
                'is_show' => true,
                'is_active' => true,
            ],
            [
                'user_id' => $user->id,
                'code' => $user->username . '-' . Str::slug('Work'),
                'name' => 'Work',
                'description' => null,
                'color' => '#FF0000',
                'order' => 1,
                'is_show' => true,
                'is_active' => true,
            ],
            [
                'user_id' => $user->id,
                'code' => $user->username . '-' . Str::slug('Family'),
                'name' => 'Family',
                'description' => null,
                'color' => '#0000FF',
                'order' => 2,
                'is_show' => true,
                'is_active' => true,
            ],
            [
                'user_id' => $user->id,
                'code' => $user->username . '-' . Str::slug('Friends'),
                'name' => 'Friends',
                'description' => null,
                'color' => '#FFA500',
                'order' => 5,
                'is_show' => true,
                'is_active' => true,
            ],
            [
                'user_id' => $user->id,
                'code' => $user->username . '-' . Str::slug('Other'),
                'name' => 'Other',
                'description' => null,
                'color' => '#800080',
                'order' => 4,
                'is_show' => true,
                'is_active' => true,
            ],
        ];

        foreach ($data as $item) {
            CatCalendar::create($item);
        }
    }
}
