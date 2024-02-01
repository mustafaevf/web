<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <script src="{{asset("js/jquery.min.js")}}"></script> 
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div class="wrapper">
        <div class="left__container">
            <div class="left__container-header">
                @if (Auth::user())
                    @php
                        $user = Auth::user();
                    @endphp
                    <div class="block">
                        <div class="block__inner">
                            <div class="block-left">
                                
                                    <div class="block-avatar">
                                        <img src="{{asset('/images/'.$user->avatar)}}" alt="">
                                    </div>
                                    <div class="block-info">
                                        <span class="title">{{$user->login}}</span>
                                        <span class="info">{{$user->balance}} руб.</span>
                                    </div>
                                
                            </div>
                            <div class="block-right">
                                <a href="/logout" class="btn-error">Выйти</a>
                            </div>
                        </div>
                    </div>
                    <div class="items__flex">
                        <a href="/pay" class="btn-primary">Пополнить</a>
                        <a href="/withdraw" class="btn-primary">Вывод</a>
                    </div>
                @else
                    <div class="block">
                        <div class="block__inner">
                            <a href="/login" class="btn-info">Авторизация</a>    

                        </div>

                    </div>
                
                @endif
            </div>
            <hr>
            <div class="left__container-menu">
                <a href="/" class="menu_link"><img src="{{asset("images/home.svg")}}" alt="">Главная</a>
                <a onclick="openModal('sell')" class="menu_link"><img src="{{asset("images/sell.svg")}}" alt="">Продать</a>    
            </div>
        </div>
        <div class="right__container">
            @yield('main')
        </div>
    </div>
    <div class="modal-wrapper" id="modal_sell" style="display: none;">
        <div class="modal-container">
            <div class="modal">
                <div class="modal-header">
                    <h3>Выберите платформу</h3>
                    <img src="{{asset('images/close.svg')}}" alt="">
                </div>
                <div class="modal-body">
                    <div class="select-main">
                        <div class="select">
                            <span>Выберите</span>
                            <img src="{{asset('images/expand_down.svg')}}" alt="">
                        </div>
                        <div class="select_opened hide">
                            @php 
                                $platforms = App\Models\Platform::where('status', 1)->get();
                            @endphp
                            <ul>
                                @foreach ($platforms as $platform)
                                    <li>
                                        <img src="{{asset('images/'. $platform->img)}}" alt="">
                                        <span>{{$platform->title}}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="modal-wrapper" style="display: none;">
        <div class="modal-container">
            <div class="modal">
                <div class="modal-header">
                    <h3>Авторизация</h3>
                    <img src="{{asset('images/close.svg')}}" alt="">
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/script.js')}}"></script>
</body>
</html>