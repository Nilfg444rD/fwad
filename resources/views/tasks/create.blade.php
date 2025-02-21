@extends('layouts.app')

@section('content')
    <div class="form-container">
        <h1>Создать новую задачу</h1>

        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf

            <label>Название:</label>
            <input type="text" name="title" required>

            <label>Описание:</label>
            <textarea name="description"></textarea>

            <label>Категория:</label>
            <select name="category_id">
                <option value="1">Работа</option>
                <option value="2">Учёба</option>
                <option value="3">Личное</option>
                <option value="4">Дом</option>
                <option value="5">Здоровье</option>
            </select>

            <label>Теги:</label>
            <div class="tags">
                <label><input type="checkbox" name="tags[]" value="1"> Срочно</label>
                <label><input type="checkbox" name="tags[]" value="2"> В работе</label>
                <label><input type="checkbox" name="tags[]" value="3"> Завершено</label>
                <label><input type="checkbox" name="tags[]" value="4"> Для команды</label>
                <label><input type="checkbox" name="tags[]" value="5"> Личное</label>
            </div>

            <label>Дата выполнения:</label>
<input type="date" name="due_date" required>
            <button type="submit" class="create-btn">Создать</button>
        </form>
    </div>

    <style>
        .form-container {
            background: #ffffff;
            padding: 20px;
            width: 50%;
            margin: auto;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        label {
            display: block;
            font-weight: bold;
            margin-top: 10px;
            text-align: left;
        }

        input, textarea, select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .tags {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
            margin-top: 10px;
        }

        .create-btn {
            background: #0073e6;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
            display: block;
            width: 50%;
            margin-left: auto;
            margin-right: auto;
        }

        .create-btn:hover {
            background: #005bb5;
        }
    </style>
@endsection
