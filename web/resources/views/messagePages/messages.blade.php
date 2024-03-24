@extends('header')
@section('main')
{{-- <div class="main-title-inline">
    <div class="main-title">
        Сообщения
    </div>
</div> --}}
<div class="message-wrapper">
    <div class="message-chat_list">
        <div class="message-chat_list-header">
            <div class="sub-title">
                Чаты
            </div>
            <img src="{{asset('images/add.svg')}}" onclick="openModal('addCategory')" style="cursor: pointer" alt="">
        </div>
        @include('messagePages/dialogs')
        
    </div>
    <div class="message-chat-output">
        <div class="message-chat-not">
            <h3>Начните диалог</h3>
            <button>Начать</button>
        </div>
        
    </div>
</div>
@stop