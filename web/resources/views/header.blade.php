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
    <div class="wrapper flex">
        <div class="sidebar flex">
            @if (Auth::user())
                @php
                    $user = Auth::user();
                @endphp
                <div class="sidebar_header flex">
                    <img src="{{asset('/images/'.$user->avatar)}}" class="avatar">
                    <div class="info flex">
                        <div class="main_text">{{$user->login}}</div>
                        <div class="secondary_text">{{$user->balance}} ₽</div>
                    </div>
                </div>
            @else
                <div class="sidebar_header flex">
                    <button id="open-modal-auth">Войти</button>
                </div>
            @endif
            
            <div class="sidebar_menu">
               
                <div class="sidebar-link flex active">
                    <img src="{{asset('images/home.svg')}}" alt="">
                    <a href="/">Главная</a>
                </div>
            
                <div class="sidebar-link flex">
                    <img src="{{asset('images/chat.svg')}}" alt="">
                    <a href="/messages">Сообщения</a>
                </div>
                <div class="sidebar-link flex">
                    <img src="{{asset('images/sell.svg')}}" alt="">
                    <a href="/sell">Продать</a>
                </div>
                <div class="line"></div>
                <div class="sidebar-link flex">
                    <img src="{{asset('images/sell.svg')}}" alt="">
                    <a href="/logout">Выйти</a>
                </div>
            </div>
        </div>
        <div class="content flex">
            @yield('main')
        </div>
    </div>
    <div class="popup" style="display: none">
        <div class="main_text">Ошибка</div>
    </div>
    <div class="modal-wrapper" style="display: none">
        <div class="modal" id="modal-auth">
            <div class="modal-header">
                <div class="main_text middle">Авторизация</div>
                <img src="{{asset('images/close.svg')}}" class="close" alt="">
            </div>
            <div class="modal-body">
                <div class="form_col" style="margin-top: .5rem;">
                    <div class="secondary_text">Имя пользователя</div>
                    <div class="input">
                        <input type="text" min-length="0" max-length="20" id="auth-login" placeholder="Имя пользователя">
                    </div>
                </div>
                <div class="form_col">
                    <div class="secondary_text">Пароль</div>
                    <div class="input">
                        <input type="password" min-length="0" max-length="100" id="auth-password" placeholder="Пароль">
                    </div>
                </div>
                <div class="form_col">
                    <button id="auth-login-submit">Войти</button>
                </div>
                <div class="line mt-1"></div>
                <div class="form_col">
                    <button class="btn-vk">Войти через Вконтакте</button>
                </div>
                <div class="form_col">
                    <button class="btn-telegram">Войти через Телеграмм</button>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/script.js')}}"></script>
    <script src="{{asset('js/validate.js')}}"></script>
    <script src="{{asset('js/select.js')}}"></script>
</body>
</html>