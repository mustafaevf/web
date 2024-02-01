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
    Выберите платформу
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
<div class="main-title">
    Последние
</div>
<div class="products">
    @php
        $products = App\Models\Product::where('status', 1)->get();
    @endphp
    @foreach($products as $product)
    <a href="/product/{{$product->id}}">
        <div class="product-block">
            <div class="product-block-header">
                <div class="product-block-title">
                    {{$product->title}}
                </div>
                <div class="product-block-price">       
                    {{$product->price}}
                </div>
            </div>
            <div class="product-block-body">
                @php
                    $platform = App\Models\Platform::where('id', $product->platform_id)->first();
                    // $user = App\Models\User::where('id', $product->user_id)
                @endphp
                <div class="platform-title">
                    <img src="{{asset('images/'.$platform->img)}}" alt="">
                    <span>{{$platform->title}}</span>
                </div>
            </div>
        </div>
    </a>
    
    @endforeach
</div>
@stop