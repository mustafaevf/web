@extends('header')
@section('main')


<div class="sidebar-top flex">
    <div class="input">
        <input type="text" placeholder="Введите название товара, категории или платформы">
    </div>
    
        @if (Auth::user())
            @php
                $user = Auth::user();
            @endphp
                @include('shared.user-top', $user)
                {{-- <div class="user-top-avatar box flex" id="open-context-user">
                    <img src="{{asset('/images/'.$user->avatar)}}" class="avatar">
                    <div class="info flex"> --}}
                        {{-- <div class="main_text middle">{{$user->login}}</div> --}}
                        {{-- <div class="secondary_text small">{{FormateMoney($user->balance)}}</div>
                    </div>
                    <img src="{{asset('images/expand_down.svg')}}" style="width: 22px" alt="">
                </div> --}}
        @else
            <button id="open-modal-auth">Войти</button>
        @endif
    
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
                        <img src="{{ asset($platform->img) }}" alt="">
                        <div class="main_text middle">{{$platform->title}}</div>
                    </div>
                </a>
            @else
            <a href="/platforms/{{strtolower($platform->title)}}">
                <div class="platform box flex">
                    <img src="{{ asset($platform->img) }}" alt="">
                    <div class="main_text middle">{{$platform->title}}</div>
                </div>
            </a>
            @endif        
        @else
            <a href="/platforms/{{strtolower($platform->title)}}">
                <div class="platform box flex">
                    <img src="{{ asset($platform->img) }}" alt="">
                    <div class="main_text middle">{{$platform->title}}</div>
                </div>
            </a>
        @endif
        
       
    @endforeach
    <a href="{{route('platform.index')}}">
        <div class="platform box flex">
            <div class="main_text middle">Еще</div>
        </div>
    </a>
</div>
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
    <div class="products-left">
        <div class="filter">
            <div class="main_text middle">Цена</div>
            <div class="form_inline mt-1">
                <div class="input"><input type="text" name="filter['from']" placeholder="От" value=""></div>
                <div class="input"><input type="number" name="filter['to']" autocomplete="name" placeholder="До" value=""></div>
            </div>
        </div>
        <div class="line"></div>
        <div class="filter">
            <div class="main_text middle">Атрибуты</div>
           
        </div>
    </div>
    <div class="products-right">
        <div class="sort">
            <div class="sort_left">
                <a href="/platforms/Вконтакте">
                    <div class="platform box flex">
                        <div class="main_text middle">Популярные</div>
                    </div>
                </a>
                <a href="/platforms/Вконтакте">
                    <div class="platform box flex">
                        <div class="main_text middle">Новые</div>
                    </div>
                </a>
            </div>
            <div class="select" >
                <div class="select-main flex" style="gap: .3rem;"><div class="main_text">Сортировать</div><img src="{{asset('images/expand_down.svg')}}" alt=""></div>
                <div class="select-options" style="display: none">
                    <div class="select-option" value=""> 
                        По цене
                    </div>
                </div>
            </div>
        </div>
        <div class="small-line">

        </div>
        <div class="products_">
            @foreach($products as $product)
                <a href="/product/{{$product->id}}">
                    <div class="product box box_type2 flex">
                        <div class="product-left">  
                            <div class="product-title">
                                {{$product->title}}
                            </div>
                            <div class="product-seller flex">
                                <img src="{{ asset('images/' . $product->user->avatar) }}" alt="" class="avatar">
                                <div class="product-seller-login secondary_text">
                                    {{$product->user->login}}                            
                                </div>
                                <div class="dot" style="background: var(--color-text-secondary);"></div>
                                <div class="product-date secondary_text">
                                    {{FormateDate($product->created_at)}}
                                </div>
                            </div>
                            <div class="product-platform flex">
                                <img src="{{ asset($product->platform->img) }}" alt=""> 
                                <div class="secondary_text">{{$product->platform->title}}</div>
                                <div class="secondary_text">/</div>
                                <div class="secondary_text">{{$product->category->name}}</div>
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
   
</div>


@stop