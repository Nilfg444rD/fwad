<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Фабрика для создания тестовых тегов
 */
class TagFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->word, // Генерируем случайное название тега
        ];
    }
}
