<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Crypt;

class RegistrationController extends Controller
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
           'password' => 'required|confirmed'
        ]);

        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

        auth()->login($user);
        return redirect()->home();
    }
}