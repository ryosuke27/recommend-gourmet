<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stores')->insert([
            [
                'name' => "ラーメン屋",
                'detail' => "ラーメン屋の説明",
                'map_url' => "http://sample",
                'mst_category_id' => 1,
                'mst_area_id' => 1,
            ],
            [
                'name' => "パスタ",
                'detail' => "パスタ屋の説明",
                'map_url' => "http://sample",
                'mst_category_id' => 2,
                'mst_area_id' => 2,
            ],
            [
                'name' => "焼きそば",
                'detail' => "焼きそば屋の説明",
                'map_url' => "http://sample",
                'mst_category_id' => 3,
                'mst_area_id' => 3,
            ],
        ]
        );
    }
}
