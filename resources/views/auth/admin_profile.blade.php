@extends('layouts.app')

@section('content')
    <div class="profile-container">
        <h1>Админ-панель</h1>
        <p>Вы вошли как <strong>Администратор</strong>.</p>

        <h2>Список пользователей:</h2>
        <ul>
            @foreach($users as $user)
                <li>{{ $user->name }} ({{ $user->email }}) - {{ $user->role }}</li>
            @endforeach
        </ul>

        <a href="{{ route('tasks.index') }}" class="btn">Перейти к задачам</a>
    </div>



    <style>
        .profile-container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 500px;
            margin: 50px auto;
        }

        .btn {
            background: #4CAF50;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-top: 15px;
        }

        .btn:hover {
            background: #45a049;
        }
    </style>
@endsection
