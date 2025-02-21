<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

/**
 * Сидер для заполнения базы тестовыми тегами
 */
class TagSeeder extends Seeder
{
    public function run()
    {
        Tag::factory()->count(10)->create(); // Создаем 10 тегов
    }
}
