@extends('layouts.header')
@section('title', 'Авторизация')

@section('content')

        <form class="form-signin" method="POST">
            {!! csrf_field() !!}
        <h2 class="form-signin-heading">Пожалуйста Войдите</h2>
        <label for="inputEmail" class="sr-only">Email адрес</label>
        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email адрес" required autofocus>
        <label for="inputPassword" class="sr-only">Пароль</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Пароль" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="1" name="remember"> Запомнить
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" name="registr" type="submit">Войти</button>
      </form>

@endsection
