@extends('header')
@section('main')
<div class="title">Авторизация</div>
<div class="form">
    
    <div class="input">
        <img src="{{asset('images/user.png')}}" alt="">
        <input type="text" autocomplete="off" id="auth-username">
    </div>
    
    <div class="input">
        <img src="{{asset('images/lock.png')}}" alt="">
        <input type="password" autocomplete="off" id="auth-password">
    </div>
    <button onclick="login()">Войти</button>
    <div class="form__footer">
        <a href="/register">Регистрация</a>
        <a href="/recovery">Забыли пароль?</a>
    </div>
</div>
@stop