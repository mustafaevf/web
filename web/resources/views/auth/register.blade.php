@extends('header')
@section('main')

<div class="main_text big mt-1">Регистрация</div>

<form method="POST" action="{{route("auth.register.store")}}">
    @csrf
    <div class="form_col" style="margin-top: .5rem;">
        <div class="secondary_text">Имя пользователя</div>
        <div class="input">
            <input type="text" min-length="0" max-length="50" name="login" autocomplete="address-level4" placeholder="Введите логин">
        </div>
        <div class="secondary_text small danger" style="display: none;">Ошибка</div>
    </div>
    <div class="form_col" style="margin-top: .5rem;">
        <div class="secondary_text">Пароль</div>
        <div class="input">
            <input type="password" min-length="0" max-length="50" name="password" autocomplete="address-level4" placeholder="Введите пароль">
        </div>
        <div class="secondary_text small danger" style="display: none;">Ошибка</div>
    </div>
    
    <div class="form_col" style="margin-top: .5rem;">
        <div class="secondary_text">Пароль</div>
        <div class="input">
            <input type="password" min-length="0" max-length="50" name="repassword" autocomplete="address-level4" placeholder="Повторите пароль">
        </div>
        <div class="secondary_text small danger" style="display: none;">Ошибка</div>
    </div>

    <div class="form_col" style="margin-top: .5rem;">
        <div class="secondary_text">Почта</div>
        <div class="input">
            <input type="email" min-length="0" max-length="50" name="email" autocomplete="address-level4" placeholder="Введите почту">
        </div>
        <div class="secondary_text small danger" style="display: none;">Ошибка</div>
    </div>

    <div class="form_col">
        <button type="submit">Регистрация</button>
    </div>
</form>
@stop