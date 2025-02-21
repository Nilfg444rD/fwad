<?php

namespace App\Models;

// Подключаем необходимые классы
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Массово заполняемые поля
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // Добавляем возможность указывать роль при создании пользователя
    ];

    /**
     * Поля, которые не должны быть видны при сериализации
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function isAdmin()
{
    return $this->role === 'admin';
}


    /**
     * Кастинг полей к определённым типам
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Проверка, является ли пользователь администратором
     */
    
    /**
     * Проверка, является ли пользователь обычным пользователем
     */
    public function isUser()
    {
        return $this->role === 'user';
    }
}
