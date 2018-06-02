<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 24.04.18
 * Time: 20:21
 */

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'destroy']);
    }

    /**
     * Отдаем вьюху входа пользователя
     */
    public function create()
    {
        return view('sessions.create');
    }

    /**
     * Авторизация пользователя
     * редирект на главную
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        if (!Auth::attempt(['email' => $email,'password' => $password])) {
            return back()->withErrors([
                'message' => 'Email или пароль неверны.'
            ]);
        }

        return redirect()->home();
    }

    /**
     * Выход из учетной записи
     * редирект на главную
     */
    public function destroy()
    {
        auth()->logout();

        return redirect()->home();
    }

}