@extends('layouts.app')

@section('content')
    <div class="auth-container">
        <div class="auth-box">
            <h1>Вход</h1>

            <form action="{{ route('login.store') }}" method="POST">
                @csrf
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Пароль" required>

                <button type="submit">Войти</button>
            </form>
        </div>

        <div class="info-box">
            <h2>Что такое To-Do App?</h2>
            <p>To-Do App — это удобное веб-приложение для управления задачами. Оно позволяет добавлять, редактировать и отслеживать выполнение задач, распределять их по категориям и тегам.</p>
            <p>Используйте To-Do App, чтобы организовать свой день и не забывать о важных делах!</p>
        </div>
    </div>

    <style>
        .auth-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 80vh;
        }

        .auth-box {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
        }

        .auth-box input {
            display: block;
            width: 100%;
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .auth-box button {
            background: #4CAF50;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        .auth-box button:hover {
            background: #45a049;
        }

        .info-box {
            margin-top: 30px;
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            width: 400px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
@endsection
