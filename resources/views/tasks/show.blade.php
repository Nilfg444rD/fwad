@extends('layouts.app')

@section('content')
    <div class="task-container">
        <h1>{{ $task->title }}</h1>
        <p>{{ $task->description }}</p>

        <p><strong>Категория:</strong> {{ $task->category->name ?? 'Без категории' }}</p>
        <p><strong>Дата выполнения:</strong> {{ \Carbon\Carbon::parse($task->due_date)->format('d.m.Y') }}</p>

        <p><strong>Теги:</strong>  
            @if($task->tags->isNotEmpty())
                @foreach ($task->tags as $tag)
                    <span class="tag">{{ $tag->name }}</span>
                @endforeach
            @else
                <span>Нет тегов</span>
            @endif
        </p>
        <a href="{{ route('tasks.edit', $task->id) }}" class="edit-btn">✏ Редактировать</a>


        <div class="actions">
            <a href="{{ route('tasks.index') }}" class="back-btn">⬅ Вернуться к списку</a>
        </div>
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

        .tag {
            display: inline-block;
            background: #0073e6;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            margin-right: 5px;
        }

        .actions {
            margin-top: 20px;
        }

        .back-btn {
            display: inline-block;
            background: #555;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
        }

        .back-btn:hover {
            background: #333;
        }
    </style>
@endsection
