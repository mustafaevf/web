@extends('header')
@section('main')
<div class="title">Восстановить пароль</div>
<div class="form">
    
    <div class="input">
        <input type="text" autocomplete="off" placeholder="Почта">
    </div>
    
    
    <button>Отправить запрос</button>
    <div class="form__footer">
        <a href="/register">Авторизация</a>
        <a href="/recovery">Забыли пароль?</a>
    </div>
</div>
@stop
