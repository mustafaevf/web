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
    @php
        $pl = App\Models\Platform::where('id', $product->platform_id)->first();
        $ct = App\Models\Category::where('id', $product->category_id)->first();
    @endphp
    <a href="/product/{{$product->id}}">
        <div class="product-block">
            <div class="product-block-platform">
                <img src="{{ asset('images/' . $pl->img) }}" alt="">
                <div class="product-block-platform-col">
                    <span class="big">{{$pl->title}}</span>
                    <span>{{$ct->name}}</span>
                </div>
            </div>
            <div class="product-block-image">
                <img src="https://playerok3.com/imgproxy/SZEXzXOKtCUQG_YPQ5_fXq6uanii1UAePN_a-UMmOjE/wm:0.8:soea:5:2:0.2/rs:fill:0:300:1/g:no/quality:99/czM6Ly9wbGF5ZXJvay8vaW1hZ2VzLzFlZWU1ZDU4LTEyY2QtNmRhMC0xMTM1LTVkNTc3YjBkMzI2ZC5qcGc.jpg" alt="">
            </div>
            <div class="product-block-body">
                <div class="product-block-price">
                    {{$product->price}} ₽
                </div>
                <div class="product-block-title">
                    {{$product->title}}
                </div>
                <div class="product-block-bottom">
                    <div class="product-block-reviews">
                        <div class="rating-star">
                            @for ($i = 1; $i < 6; $i++)
                                <img src="{{asset('images/star_no.svg')}}" alt="">
                            @endfor
                        </div>
                    </div>
                    <div class="rating-text">
                        <span>0</span> 
                    </div>
                </div>
            </div>
            
        </div>
    </a>
    
    @endforeach

    
</div>
@stop