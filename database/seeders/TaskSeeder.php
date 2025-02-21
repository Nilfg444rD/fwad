<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;

/**
 * Сидер для заполнения базы тестовыми задачами
 */
class TaskSeeder extends Seeder
{
    public function run()
    {
        Task::factory()->count(10)->create(); // Создаем 10 задач
    }
}
