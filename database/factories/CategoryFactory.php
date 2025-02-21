<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Фабрика для создания тестовых категорий
 */
class CategoryFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->word, // Генерируем случайное название категории
            'description' => $this->faker->sentence, // Генерируем случайное описание
        ];
    }
}
