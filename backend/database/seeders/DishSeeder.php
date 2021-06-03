<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dishes')->insert(
            [
                'name' => "ラーメン",
                'description' => "ラーメンの説明",
                'map_id' => 1,
            ],
        );
    }
}
