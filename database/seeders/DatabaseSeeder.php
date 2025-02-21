<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

/**
 * Главный сидер, который запускает все остальные
 */
class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            CategorySeeder::class,
            TaskSeeder::class,
            TagSeeder::class,
        ]);
    }
}
