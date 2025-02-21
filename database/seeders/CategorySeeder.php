<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

/**
 * Сидер для заполнения базы тестовыми категориями
 */
class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::factory()->count(5)->create(); // Создаем 5 категорий
    }
}
