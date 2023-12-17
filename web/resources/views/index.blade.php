<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <div class="left__container">
            <div class="left__container-header">
                <div class="block">
                    <div class="block__inner">
                        <div class="block-left">
                            <div class="block-avatar">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQGPzSYh4QjfE8boyDWvhHoLagaM5PlnMw8sYfhR1kpow&s" alt="">
                            </div>
                            <div class="block-info">
                                <span class="title">ЯУЕБАН</span>
                                <span class="info">3 745 руб.</span>
                            </div>
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
            <div class="input">
                <img src="{{asset('images/search.png')}}" alt="">
                <input type="text" placeholder="Введите название товара">
                <button>Найти</button>
            </div>
        </div>
    </div>
   
</body>
</html>