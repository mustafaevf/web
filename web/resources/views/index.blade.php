@extends('header')
@section('main')


<div class="input">
    <input type="text" placeholder="Введите название товара, категории или платформы">
</div>

<div class="main_text big mt-1 flex">Платформы</div>
    
<div class="platforms flex">
    @php
        $platforms = App\Models\Platform::where('status', 1)->get();
        $viewPlatform = -1;
    @endphp
    @foreach($platforms as $platform)
        @if ($viewPlatform != -1)
            @if ($platform->id == $viewPlatform)
                <a href="/platforms/{{strtolower($platform->title)}}">
                    <div class="platform box flex active">
                        <img src="{{ asset('images/' . $platform->img) }}" alt="">
                        <div class="main_text middle">{{$platform->title}}</div>
                    </div>
                </a>
            @else
            <a href="/platforms/{{strtolower($platform->title)}}">
                <div class="platform box flex">
                    <img src="{{ asset('images/' . $platform->img) }}" alt="">
                    <div class="main_text middle">{{$platform->title}}</div>
                </div>
            </a>
            @endif        
        @else
            <a href="/platforms/{{strtolower($platform->title)}}">
                <div class="platform box flex">
                    <img src="{{ asset('images/' . $platform->img) }}" alt="">
                    <div class="main_text middle">{{$platform->title}}</div>
                </div>
            </a>
        @endif
        
        
    @endforeach
</div>
<a href="{{route("platform.index")}}" class="button mt-1">Все платформы</a>
@if ($viewPlatform != -1)
<div class="main_text big mt-1">Категории</div>
<div class="platforms flex">
    @php
        $categories = App\Models\Category::where('platform_id', $viewPlatform)->get();
    @endphp
    @foreach($categories as $category)
        <a href="{{url()->current()}}/{{strtolower(Translit($category->name, 0))}}">
            <div class="platform box flex">
                <div class="main_text">{{$category->name}}</div>
            </div>
        </a>
    @endforeach
</div>
@endif
<div class="products">
    <div class="main_text big">
        Фильтры
    </div>
    <div class="filters flex">
        <div class="filter_col flex">
            <div class="secondary_text small">
                Минимальная цена
            </div>
            <div class="input">
                <input type="text">
            </div>
        </div>
        <div class="filter_col flex">
            <div class="secondary_text small">
                Макс цена
            </div>
            <div class="input">
                <input type="text">
            </div>
        </div>
    </div>  
    <div class="products_">
        @foreach($products as $product)
            @php
                $pl = App\Models\Platform::where('id', $product->platform_id)->first();
                $ct = App\Models\Category::where('id', $product->category_id)->first();
                $seller = App\Models\User::where('id', $product->user_id)->first();
            @endphp
            <a href="/product/{{$product->id}}">
                <div class="product box box_type2 flex">
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
                            <img src="{{ asset('images/' . $pl->img) }}" alt=""> 
                            <div class="secondary_text">{{$pl->title}}</div>
                            <div class="secondary_text">/</div>
                            <div class="secondary_text">{{$ct->name}}</div>
                        </div>
                    </div>
                    <div class="product-right">
                        <div class="product-price">
                            {{FormateMoney($product->price)}}
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>



@stop