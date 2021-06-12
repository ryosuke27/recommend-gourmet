<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MstCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mst_categories')->insert([
            [
                'id' => 1,
                'name' => "和食",
            ],
            [
                'id' => 2,
                'name' => "寿司・海鮮",
            ],
            [
                'id' => 3,
                'name' => "ラーメン・麺類",
            ],
            [
                'id' => 4,
                'name' => "丼もの",
            ],
            [
                'id' => 5,
                'name' => "アジア・エスニック",
            ],
            [
                'id' => 6,
                'name' => "中華",
            ],
            [
                'id' => 7,
                'name' => "イタリア",
            ],
            [
                'id' => 8,
                'name' => "洋食・西洋料理",
            ],
        ]);
    }
}
