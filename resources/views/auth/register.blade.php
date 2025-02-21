@extends('layouts.app')

@section('content')
    <div class="auth-container">
        <h1>Регистрация</h1>

        <form action="{{ route('register.store') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Имя" value="{{ old('name') }}" required>
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
            <input type="password" name="password" placeholder="Пароль" required>
            <input type="password" name="password_confirmation" placeholder="Подтвердите пароль" required>

            <button type="submit">Зарегистрироваться</button>
        </form>

        <p>Уже есть аккаунт? <a href="{{ route('login') }}">Войти</a></p>
    </div>
@endsection
