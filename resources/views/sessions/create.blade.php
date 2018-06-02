@extends('layouts.master')

@section('content')

    <div class="offset-4 col-sm-4">

        <h1>Вход</h1>

        <form method="post" action="/login">

            {{ csrf_field() }}

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="" required>
            </div>

            <div class="form-group">
                <label for="password">Пароль</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary align-self-center">Войти</button>
                <a href="/password/reset">Забыли пароль?</a>
            </div>

            <div class="form-group">
                @include('layouts.errors')
            </div>

        </form>
    </div>

@endsection