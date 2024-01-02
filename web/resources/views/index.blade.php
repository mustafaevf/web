@extends('header')
@section('main')
<div class="input_flex">
    <div class="input">
        <img src="{{asset('images/search.png')}}" alt="">
        <input type="text" placeholder="Введите название товара">
    </div>
    <button>Найти</button>
</div>
<div class="main-title">
    Выберите категорию
</div>
<div class="main-platforms">
    <a href="/platform/">
        <div class="platform-block">
            <img src="{{asset('images/telegram.svg')}}" alt="">

        </div>
    </a>
</div>
@stop