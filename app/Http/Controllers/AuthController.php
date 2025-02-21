<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Форма регистрации
    public function register()
    {
        return view('auth.register'); // Возвращает представление формы регистрации
    }

    // Обработка данных из формы регистрации
    public function storeRegister(Request $request)
    {
        // Валидация данных
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Создание пользователя
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Вход пользователя после регистрации
        Auth::login($user);

        return redirect()->route('tasks.index')->with('success', 'Вы успешно зарегистрировались!');
    }

    public function profile()
    {
        $user = auth()->user();
    
        if ($user->isAdmin()) {
            // Если админ, показываем всех пользователей
            $users = \App\Models\User::all();
            return view('auth.admin_profile', compact('users'));
        }
    
        // Если обычный пользователь, показываем только его профиль
        return view('auth.profile', compact('user'));
    }
    
    


    // Форма входа
    public function login()
    {
        return view('auth.login'); // Возвращает представление формы входа
    }

    // Обработка входа
    public function storeLogin(Request $request)
    {
        // Валидация данных
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Попытка входа
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('tasks.index')->with('success', 'Вы вошли в систему!');
        }

        // Ошибка входа
        return back()->withErrors(['email' => 'Неверный email или пароль']);
    }

    // Выход из системы
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Вы вышли из системы.');
    }
}
