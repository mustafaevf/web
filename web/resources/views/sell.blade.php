@extends('header')
@section('main')
    @php
        $platform = App\Models\Platform::where('title', ucfirst($platform_title))->first();
        
    @endphp
    @if (!$platform)
        {{redirect('error', ['message' => 'нет'])}}
    @endif
    <div class="title" style="display: flex; align-items: center;">
        {{$platform->title}}
        <img src="{{asset('images/'.$platform->img)}}" alt=""> 
    </div>
    <div class="form">
        <div class="form-block">
            <p class="label">Заголовок</p>
            <div class="input">
                <input type="text" autocomplete="off" placeholder="" id="sell-title">
            </div>
        </div>
        <div class="form-block">
            <p class="label">Категория</p>
            <div class="select" id="choose-category">
                <span>Выберите</span>
                <img src="{{asset('images/expand_down.svg')}}" alt="">
            </div>
            <div class="select_opened hide">
                @php
                    $categories =  App\Models\Category::where('platform_id', $platform->id)->get();
                @endphp
                <ul>
                    @foreach ($categories as $category)
                        <li>{{$category->name}}</li>                        
                    @endforeach
                </ul>
            </div>
            <!-- <div class="input">
                <input type="text" autocomplete="off" placeholder="" id="sell-category">
            </div> -->
        </div>
        <div class="form-block">
            <p class="label">Описание товара</p>
            <div class="input">
                <textarea id="sell-description"></textarea>
            </div>
        </div>
        <div class="form-block">
            <p class="label">Информация для покупателя</p>
            <div class="input">
                <textarea id="sell-info"></textarea>
            </div>
        </div>
        <div class="form-block">
            <p class="label">Цена</p>
            <div class="input">
                <input type="text" autocomplete="off" placeholder="" id="sell-price">
            </div>
        </div>
        <button onclick=sell_confirm({{$platform->id}})>Добавить</button>
    </div>

@stop