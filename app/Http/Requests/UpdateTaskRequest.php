<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|min:3',
            'description' => 'nullable|string|max:500',
            'due_date' => 'required|date|after_or_equal:today',
            'category_id' => 'required|exists:categories,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Поле "Название" обязательно.',
            'title.min' => 'Название должно содержать минимум 3 символа.',
            'description.max' => 'Описание не должно превышать 500 символов.',
            'due_date.required' => 'Поле "Дата выполнения" обязательно.',
            'due_date.after_or_equal' => 'Дата выполнения не может быть в прошлом.',
            'category_id.required' => 'Выберите категорию.',
            'category_id.exists' => 'Выбранная категория не существует.',
        ];
    }
}
