@extends('layouts.app')

@section('content')
    <div class="task-list-container">
        <h1>📋 Список задач</h1>

        @if($tasks->isEmpty())
            <p>Задач пока нет. Добавьте новую!</p>
        @else
            @foreach ($tasks as $task)
                @if (!preg_match('/[a-zA-Z]/', $task->title)) {{-- Фильтр: убираем задачи на английском --}}
                    <div class="task-card">
                        <h3>
                            <a href="{{ route('tasks.show', $task->id) }}">{{ $task->title }}</a>
                        </h3>
                        <p><strong>Дата выполнения:</strong> {{ \Carbon\Carbon::parse($task->due_date)->format('d.m.Y') }}</p>
                        <p><strong>Категория:</strong> <span class="category">{{ $task->category->name ?? 'Без категории' }}</span></p>
                    </div>
                @endif
            @endforeach
        @endif
    </div>

    <style>
        .task-list-container {
            background: #fff;
            padding: 20px;
            width: 60%;
            margin: auto;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .task-card {
            background: #f8f9fa;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .task-card h3 {
            margin: 0;
        }

        .task-card .category {
            font-weight: bold;
            color: #555;
        }
    </style>
@endsection
