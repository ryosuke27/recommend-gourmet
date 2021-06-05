<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
                'name' => Str::random(10),
                'description' => Str::random(30),
                'map_id' => 1,
                'image_path' => Str::random(20),
            ],
        );
    }
}
