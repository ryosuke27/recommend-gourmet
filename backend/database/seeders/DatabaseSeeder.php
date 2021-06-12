<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            MstCategorySeeder::class,
            MstAreaSeeder::class,
            DishSeeder::class,
            FavoriteSeeder::class,
            StoreSeeder::class,
            MapSeeder::class,
        ]);
    }
}
