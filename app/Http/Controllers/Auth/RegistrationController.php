<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Rules\Phone;
use App\User;
use http\Env\Request;
use Illuminate\Support\Facades\Crypt;

/*
 * TODO
 * П.с. лучше передавать кастомные валидаторы с челвоеческми названиями типо phone_number
 * Переделать валидацию в адекватный вид
 */

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
//        dd(empty(request('phone')));
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => ['nullable','unique:users', new Phone],
            'password' => 'required|confirmed'
        ];
        $create = [
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ];
        if(!empty(request('phone'))){
            $rules['phone'] = ['nullable','unique:users', new Phone];
            $create['phone'] = request('phone');
        }

        $this->validate(request(), $rules);
        $user = User::create($create);

        auth()->login($user);
        return redirect()->home();
    }
}