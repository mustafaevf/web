@extends('header')
@section('main')

<div class="input">
    <input type="text" placeholder="Введите название товара, категории или платформы">
</div>
<div class="main_text big mt-1">Платформы</div>
<div class="platforms flex">
    @php
        $platforms = App\Models\Platform::where('status', 1)->get();
    @endphp
    @foreach($platforms as $platform)
        <a href="/platforms/{{strtolower($platform->title)}}">
            <div class="platform box flex">
                <img src="{{ asset('images/' . $platform->img) }}" alt="">
                <div class="main_text">{{$platform->title}}</div>
            </div>
        </a>
    @endforeach
    
</div>
<div class="products">
    <div class="main_text middle">
        Фильтры
    </div>
    <div class="filters flex">
        <div class="filter_col flex">
            <div class="secondary_text">
                Минимальная цена
            </div>
            <div class="input">
                <input type="text">
            </div>
        </div>
        <div class="filter_col flex">
            <div class="secondary_text">
                Макс цена
            </div>
            <div class="input">
                <input type="text">
            </div>
        </div>
    </div>  
    <div class="products_">
        @php
            $products = App\Models\Product::where('status', 1)->get();
        @endphp
        @foreach($products as $product)
            @php
                $pl = App\Models\Platform::where('id', $product->platform_id)->first();
                $ct = App\Models\Category::where('id', $product->category_id)->first();
                $seller = App\Models\User::where('id', $product->user_id)->first();
            @endphp
            <a href="/product/{{$product->id}}">
                <div class="product box flex">
                    <div class="product-left">
                        <div class="product-title">
                            {{$product->title}}
                        </div>
                        <div class="product-seller flex">
                            <img src="{{ asset('images/' . $seller->avatar) }}" alt="" class="avatar">
                            <div class="product-seller-login secondary_text">
                                {{$seller->login}}                            
                            </div>
                            <div class="dot" style="background: var(--color-text-secondary);"></div>
                            <div class="product-date secondary_text">
                                {{FormateDate($product->created_at)}}
                            </div>
                        </div>
                        <div class="product-platform flex">
                            <img src="{{ asset('images/' . $platform->img) }}" alt=""> 
                            <div class="secondary_text">{{$pl->title}}</div>
                            <div class="secondary_text">/</div>
                            <div class="secondary_text">{{$ct->name}}</div>
                        </div>
                    </div>
                    <div class="product-right">
                        <div class="product-price">
                            {{$product->price}} ₽
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>



@stop