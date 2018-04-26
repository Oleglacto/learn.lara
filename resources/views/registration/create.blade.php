@extends('layouts.master')

@section('content')

    <div class="offset-4 col-sm-4">

        <h1>Регистрация</h1>

        <form method="post" action="/registration">

            {{ csrf_field() }}

            <div class="form-group">
                <label for="name">Имя пользователя</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="" required>
            </div>

            <div class="form-group">
                <label for="email">Телефон</label>
                <input type="tel" name="phone" id="phone" class="form-control" placeholder="">
            </div>

            <div class="form-group">
                <label for="password">Пароль</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Повторите пароль</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary align-self-center">Регистрация</button>
            </div>

            <div class="form-group">
                @include('layouts.errors')
            </div>

        </form>
    </div>

@endsection