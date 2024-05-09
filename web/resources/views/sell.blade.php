@extends('header')
@section('main')
<div class="steps flex">
    <div class="step active">
        Основная информация
    </div>
    <div class="dot"></div>
    <div class="dot"></div>
    <div class="dot"></div>
    <div class="step">
        Дополнительная информация
    </div>
    <div class="dot"></div>
    <div class="dot"></div>
    <div class="dot"></div>
    <div class="step">
        Подтверждение
    </div>
</div>

<div class="step_1">
    <div class="main_text big mt-1">Выберите платформу</div>
    <div class="platforms flex">
        @php
            $platforms = App\Models\Platform::where('status', 1)->get();
        @endphp
        @foreach ($platforms as $platform)
            <div class="platform box box_type2 flex">
                <img src="{{asset('images/'.$platform->img)}}" alt="">
                <div class="main_text">{{$platform->title}}</div>
            </div>
        @endforeach
           
    </div>

</div>
<div class="step_2" style="display: none;">
    <div class="main_text big mt-1">Выберите категорию</div>
    <div class="platforms flex">
        
    </div>
</div>

<div class="step_3" style="display: none;">
    <div class="form box mt-1">
        <div class="main_text middle">Основная информация</div>
        <div class="form_col">
            <div class="secondary_text">Краткое описание</div>
            <div class="input">
                <input type="text" min-length="0" max-length="100" id="product-title" placeholder="Количество символов (0-100)">
            </div>
            <div class="secondary_text small danger" style="display: none;">Ошибка</div>
        </div>
        <div class="form_col">
            <div class="secondary_text">Подробное описание</div>
            <textarea name="" id="product-description"></textarea>
            <div class="secondary_text small danger" style="display: none;">Ошибка</div>
        </div>
        <div class="form_col">
            <div class="secondary_text">Цена</div>
            <div class="input">
                <input type="number" min-number="99" max-number="10000" id="product-price" placeholder="Минимальная цена 100 ₽">
            </div>
            <div class="secondary_text small danger" style="display: none;">Ошибка</div>
        </div>
        <div class="form_col">
            <button>Подтвердить</button>
        </div>
    </div>
</div>

<div class="step_4" style="display: none;">
    <div class="form box mt-1">
        <div class="main_text middle">Дополнительная информация</div>
        <div class="form_col">
            <div class="secondary_text">Происхождение аккаунта</div>
            <div class="choose_block flex">
                <div class="choose_btn box active">Брут</div>
                <div class="choose_btn box">Личный</div>
            </div>
        </div>
        <div class="form_col">
            <button>Подтвердить</button>
        </div>
    </div>
</div>

<div class="step_5" style="display: none;">
    <div class="form box mt-1">
        <div class="main_text middle">Подтверждение</div>
        <div class="form_col">
            <div class="secondary_text">Данные для покупателя</div>
            <textarea name="" id=""></textarea>
        </div>
        <div class="form_col">
            <button>Подтвердить</button>
        </div>
    </div>
</div>
<div class="step_6" style="display: none;">
    <input type="text" value="" id="result-platform-title">
    <input type="text" value="" id="result-category-title">
    <input type="text" value="" id="result-product-title">
    <input type="text" value="" id="result-product-description">
    <input type="text" value="" id="result-product-aditional-information">
    <input type="text" value="" id="result-product-price">
    <input type="text" value="" id="result-product-action">
</div>



<script src="{{asset('js/viewScript/sell.js')}}"></script>
@stop