@extends('header-auth')
@section('main')
<div class="title">Регистрация</div>
<div class="form">
    
    <div class="input">
        <img src="{{asset('images/user.png')}}" alt="">
        <input type="text" autocomplete="off" placeholder="Логин" id="auth-login">
    </div>
    <div class="input">
        <input type="email" autocomplete="off" placeholder="Почта" id="auth-email">
    </div>
    <div class="input">
        <img src="{{asset('images/lock.png')}}" alt="">
        <input type="password" autocomplete="off" placeholder="Пароль" id="auth-password">
    </div>
    <div class="input">
        <img src="{{asset('images/lock.png')}}" alt="">
        <input type="password" autocomplete="off" placeholder="Повтор пароля" id="auth-re-password">
    </div>
    <button onclick="register()">Создать аккаунт</button>
    <div class="form__footer">
        <a href="/login">Авторизация</a>
        <a href="/recovery">Забыли пароль?</a>
    </div>
</div>
@stop