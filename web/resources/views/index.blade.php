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
    @php
        $platforms = App\Models\Platform::where('status', 1)->get();
    @endphp

    @foreach($platforms as $platform)
        <a href="/platforms/{{strtolower($platform->title)}}">
            <div class="platform-block">
                <img src="{{ asset('images/' . $platform->img) }}" alt="">
            </div>
        </a>

    @endforeach
</div>
@stop