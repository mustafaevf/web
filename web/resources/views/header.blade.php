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
            <div class="sidebar_header flex">
                {{-- @if (Auth::user())
                    @php
                        $user = Auth::user();
                    @endphp
                    
                        <img src="{{asset('/images/'.$user->avatar)}}" class="avatar">
                        <div class="info flex">
                            <div class="main_text middle">{{$user->login}}</div>
                            <div class="secondary_text small">{{FormateMoney($user->balance)}}</div>
                        </div>
                    
                @endif --}}
            </div>
            
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
                
                @if (Auth::user())
                    @php
                        $user = Auth::user();
                    @endphp
                    <div class="line"></div>
                    @if ($user->status == 2)
                        <div class="line"></div>
                        <div class="sidebar-link flex">
                            <div class="dropdown">
                                <div class="dropdown-main">
                                    <div class="secondary_text">Админка</div>
                                    <img src="{{asset('images/expand_down.svg')}}" alt="">
                                </div>
                                <div class="dropdown-options" style="display: none">
                                    <div class="sidebar-link flex">
                                        <a href="/admin/users">Пользователи</a>
                                    </div>
                                    <div class="sidebar-link flex">
                                        <a href="/admin/categories">Категории</a>
                                    </div>
                                    <div class="sidebar-link flex">
                                        <a href="/admin/products">Продукты</a>
                                    </div>
                                    <div class="sidebar-link flex">
                                        <a href="/admin/platforms">Платформы</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif
               
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
                <div class="main_text big">Авторизация</div>
                <img src="{{asset('images/close.svg')}}" class="close" alt="">
            </div>
            <div class="modal-body">
                <div class="form_col" style="margin-top: .5rem;">
                    <div class="secondary_text middle">Имя пользователя</div>
                    <div class="input">
                        <input type="text" min-length="0" max-length="20" id="auth-login" placeholder="Имя пользователя">
                    </div>
                </div>
                <div class="form_col">
                    <div class="secondary_text middle">Пароль</div>
                    <div class="input">
                        <input type="password" min-length="0" max-length="100" id="auth-password" autocomplete="off" placeholder="Пароль">
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
    @if (Auth::user())
    <div class="context" id="context-user">
        <div class="context-inner">
            <li><a href="{{route('user.show', $user->login)}}"><div class="secondary_text small">Мой профиль</div></a></li>
            <li><a href="{{route('payment.pay')}}"><div class="secondary_text small">Пополнение</div></a></li>
            <li><a href="{{route('payment.withdraw')}}"><div class="secondary_text small">Вывод</div></a></li>
            <li><a href="{{route('auth.logout.store')}}"><div class="secondary_text small danger">Выйти</div></a></li>
        </div>
    </div>
    @endif
    
    
    <script src="{{asset('js/script.js')}}"></script>
    <script src="{{asset('js/validate.js')}}"></script>
    <script src="{{asset('js/select.js')}}"></script>
</body>
</html>