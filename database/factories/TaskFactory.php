<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

/**
 * Фабрика для создания тестовых задач
 */
class TaskFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3), // Генерируем случайное название задачи
            'description' => $this->faker->text(100), // Генерируем случайное описание
            'category_id' => Category::factory(), // Привязываем к случайной категории
        ];
    }
}
