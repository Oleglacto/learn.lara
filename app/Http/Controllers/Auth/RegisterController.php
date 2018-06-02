<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Rules\Phone;
use App\Models\User;

class RegisterController extends Controller
{

    /**
     * Отдаем вьюху регистрации
     */
    public function create()
    {
        return view('registration.create');
    }

    /**
     * Регистрация пользователя
     * Авторизация
     * редирект на главную
     */
    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => ['nullable', 'unique:users', new Phone()],
            'password' => 'required|confirmed'
        ]);
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'phone' => request('phone'),
            'password' => bcrypt(request('password'))
        ]);
        auth()->login($user);

        return redirect()->home();
    }
}