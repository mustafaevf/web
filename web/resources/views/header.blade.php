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
                <div class="block">
                    <div class="block__inner">
                        <div class="block-left">
                            @if (Auth::user())
                                @php
                                    $user = Auth::user();
                                @endphp
                                <div class="block-avatar">
                                    <img src="{{asset('/images/'.$user->avatar)}}" alt="">
                                </div>
                                <div class="block-info">
                                    <span class="title">{{$user->login}}</span>
                                    <span class="info">{{$user->balance}} руб.</span>
                                </div>
                            @endif
                        </div>
                        <div class="block-right">
                            <a href="/logout" class="btn-error">Выйти</a>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="left__container-menu">
                <li>
                    <a href="">Продать</a>
                </li>
            </div>
        </div>
        <div class="right__container">
            @yield('main')
        </div>
    </div>
    <script src="{{asset('js/script.js')}}"></script>
</body>
</html>