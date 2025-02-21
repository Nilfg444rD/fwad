<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;

// Главная страница и страница "О нас"
Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);

// Группа маршрутов для задач (только для авторизованных пользователей)
Route::middleware(['auth'])->group(function () {
    Route::prefix('/tasks')->group(function () {
        Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
        Route::get('/create', [TaskController::class, 'create'])->name('tasks.create');
        Route::post('/', [TaskController::class, 'store'])->name('tasks.store');
        Route::get('/{id}', [TaskController::class, 'show'])->name('tasks.show')->where('id', '[0-9]+');
        Route::get('/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit')->where('id', '[0-9]+');
        Route::put('/{id}', [TaskController::class, 'update'])->name('tasks.update')->where('id', '[0-9]+');
        Route::delete('/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy')->where('id', '[0-9]+');
    });
});

// Маршруты аутентификации
Route::get('/profile', [AuthController::class, 'profile'])->middleware('auth')->name('profile');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'storeRegister'])->name('register.store');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'storeLogin'])->name('login.store');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Админ-панель (доступ только для админов)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AuthController::class, 'adminDashboard'])->name('admin.dashboard');
});
