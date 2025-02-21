@extends('layouts.app')

@section('content')
    <div class="task-container">
        <h1>Редактировать задачу</h1>

        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label>Название:</label>
            <input type="text" name="title" value="{{ old('title', $task->title) }}" required>

            <label>Описание:</label>
            <textarea name="description">{{ old('description', $task->description) }}</textarea>

            <label>Дата выполнения:</label>
            <input type="date" name="due_date" value="{{ old('due_date', $task->due_date) }}" required>

            <label>Категория:</label>
            <select name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $task->category_id) == $category->id ? 'selected' : '' }}>
                        {{ __('categories.' . $category->name) ?? 'Без категории' }}
                    </option>
                @endforeach
            </select>

            <label>Теги:</label>
            <div class="tags-container">
                @foreach($tags as $tag)
                    <label>
                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                            {{ $task->tags->contains($tag->id) ? 'checked' : '' }}>
                        {{ $tag->name }}
                    </label>
                @endforeach
            </div>

            <button type="submit" class="update-btn">Обновить</button>
        </form>

        <a href="{{ route('tasks.index') }}" class="back-btn">⬅ Вернуться к списку</a>
    </div>

    <style>
        .task-container {
            background: #ffffff;
            padding: 20px;
            width: 50%;
            margin: auto;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        input, textarea, select {
            width: 100%;
            margin-bottom: 10px;
            padding: 8px;
        }

        .tags-container {
            text-align: left;
            margin-bottom: 10px;
        }

        .update-btn {
            background: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .update-btn:hover {
            background: #0056b3;
        }

        .back-btn {
            display: inline-block;
            margin-top: 10px;
            color: #333;
            text-decoration: none;
        }
    </style>
@endsection
