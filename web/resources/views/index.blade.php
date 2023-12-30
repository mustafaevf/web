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
@stop