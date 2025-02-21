<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do App</title>

    <style>
        /* Общие стили */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: rgba(254, 235, 235, 0.8);
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Шапка */
        nav {
            background-color: #ffffff;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .nav-links {
            display: flex;
            gap: 20px;
        }

        .nav-auth {
            display: flex;
            gap: 10px;
        }

        nav a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
            padding: 8px 15px;
            border-radius: 5px;
            transition: background 0.3s ease;
        }

        nav a:hover {
            background-color: #e0e0e0;
        }

        /* Кнопка выхода */
        .logout-form {
            display: inline;
        }

        .logout-btn {
            background: #ff4d4d;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        .logout-btn:hover {
            background: #cc0000;
        }

        /* Контент */
        .container {
            flex-grow: 1;
            margin: 50px auto;
            padding: 20px;
            width: 60%;
            background-color: #ffffff;
            color: #333;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #444;
        }

        /* Флеш-сообщения */
        .flash-message {
            background: #d4edda;
            color: #155724;
            padding: 10px;
            margin: 10px auto;
            width: 60%;
            border-radius: 5px;
            text-align: center;
            border: 1px solid #c3e6cb;
        }

        /* Футер */
        footer {
            background-color: #ffffff;
            color: #777;
            text-align: center;
            padding: 10px;
            margin-top: auto;
        }
    </style>
</head>
<body>

    <nav>
        <div class="nav-links">
            <a href="{{ route('tasks.index') }}">Список задач</a>
            <a href="{{ route('tasks.create') }}">Создать задачу</a>
            <a href="/">Главная</a>
            <a href="/about">О нас</a>
        </div>

        <div class="nav-auth">
    @guest
        <a href="{{ route('login') }}">Вход</a>
        <a href="{{ route('register') }}">Регистрация</a>
    @else
        <a href="{{ route('profile') }}">Личный кабинет</a>
        <form action="{{ route('logout') }}" method="POST" class="logout-form">
            @csrf
            <button type="submit" class="logout-btn">Выйти</button>
        </form>
    @endguest
</div>

                
        </div>
    </nav>

    <div class="container">
        @if (session('success'))
            <div class="flash-message">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>

    <footer>
        © 2025 To-Do App для команд
    </footer>

</body>
</html>
