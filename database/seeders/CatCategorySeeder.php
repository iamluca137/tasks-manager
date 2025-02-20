<?php

namespace Database\Seeders;

use App\Models\CatCalendar;
use Illuminate\Database\Seeder;

class CatCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'user_id' => 1,
                'name' => 'Personal',
                'description' => null,
                'color' => '#008000',
                'order' => 0,
                'is_show' => true,
            ],
            [
                'user_id' => 1,
                'name' => 'Work',
                'description' => null,
                'color' => '#FF0000',
                'order' => 1,
                'is_show' => true,
            ],
            [
                'user_id' => 1,
                'name' => 'Family',
                'description' => null,
                'color' => '#0000FF',
                'order' => 2,
                'is_show' => true,
            ],
            [
                'user_id' => 1,
                'name' => 'Friends',
                'description' => null,
                'color' => '#FFA500',
                'order' => 5,
                'is_show' => true,
            ],
            [
                'user_id' => 1,
                'name' => 'Other',
                'description' => null,
                'color' => '#800080',
                'order' => 4,
                'is_show' => true,
            ],
        ];

        foreach ($data as $item) {
            CatCalendar::create($item);
        }
    }
}
