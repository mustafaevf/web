@extends('header')
@section('main')
<div class="title">Вывести средства</div>
<div class="form">
    <div class="form-block">
        <p class="label">Куда выплатить </p>
        <div class="methods-block">
            <div class="method-block active">
                <div class="method-block-inner">
                    <img src="{{asset('images/cbp.svg')}}" alt="">
                    <div class="inner-flex">
                        <p>СБП</p>
                        <div class="circle"></div>
                    </div>
                </div>
                
            </div>
            <div class="method-block">
                <div class="method-block-inner">
                    <img src="{{asset('images/qiwi.svg')}}" alt="">
                    <div class="inner-flex">
                        <p>QIWI</p>
                        <div class="circle"></div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <div class="form-block">
        @php
            $user = Auth::user();
        @endphp
        <p class="label">Сумма вывода - доступно <span>{{$user->balance}} рублей</span></p>
        <div class="input">
            <input type="text" autocomplete="off" placeholder="" id="auth-email">
        </div>
    </div>
    <button>Пополнить</button>
</div>

@stop