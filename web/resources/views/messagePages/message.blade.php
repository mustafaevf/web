@extends('header')
@section('main')
<div class="message-wrapper">
    <div class="message-chat_list">
        <div class="message-chat_list-header">
            <div class="sub-title">
                Чаты
            </div>
            <img src="{{asset('images/add.svg')}}" onclick="openModal('addCategory')" style="cursor: pointer" alt="">
        </div>
        @include('messagePages/dialogs')
        {{-- <div class="message-chat_list-chats">
            <div class="message-chat">
                <div class="message-chat-avatar">
                    <img src="{{asset('images/nophoto.png')}}">
                </div>
                <div class="message-chat-con">
                    <div class="message-chat-login">
                        Поддержка
                    </div>
                    <div class="message-chat-last_message">
                        sdajkfsdkfl
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
    <div class="message-chat-output">
        {{-- <div class="message-chat-not">
            <h3>Начните диалог</h3>
            <button>Начать</button>
        </div> --}}
        <div class="message-chat-output_wrapper">
            <div class="message-chat-output_wrapper-header">
                <div class="contact-block">
                    <img src="{{asset('images/nophoto.png')}}">
                    <p>{{$user->login}}</p>
                </div>
                <div class="contact-info">
                    <p>Был в сети недавно</p>
                </div>
                <div class="contact-settings">
                    <img src="{{asset('images/flag.svg')}}" style="cursor: pointer">
                </div>
            </div>
            <div class="message-chat-output_wrapper-body">
                <div class="message_wrapper">
                    @php
                        $sender_user = Auth::user();
                        $prev_date = '';
                    @endphp
                    
                    @foreach ($messages as $message)
                        @if ($message->sender_id == $sender_user->id)
                            @if (substr($message->created_at, 5, 5) != $prev_date)
                            @php
                                $day = substr(substr($message->created_at, 5, 5), -2, 2);
                                $month = substr(substr($message->created_at, 5, 5), 0, 2);
                                $months = [
                                    '01' => 'января',
                                    '02' => 'февраля',
                                    '03' => 'марта',
                                    '04' => 'апреля'
                                ];

                            @endphp
                                <span style="text-align: center">{{$day}} {{$months[$month]}}</span>
                                @php
                                    $prev_date = substr($message->created_at, 5, 5);
                                    
                                @endphp
                            @endif
                        <div class="message-right">
                            <div class="message-right-inner">
                                {{$message->message}}
                                
                            </div>
                            <span>{{substr($message->created_at, -8, 5)}}</span>
                        </div>
                        @else
                        <div class="message-left">
                            <div class="message-left-inner">
                                {{$message->message}}
                            </div>
                            <span>{{substr($message->created_at, -8, 5)}}</span>
                        </div>
                        @endif
                    @endforeach
                </div>
                
            </div>
            <div class="message-chat-output_wrapper-footer">
                <div class="input" style="padding: .1rem .3rem;">
                    <input type="text" id="message_text" placeholder="Введите сообщение">
                    <img src="{{asset('images/send.svg')}}" alt="" style="width: 30px; height: 30px; cursor: pointer;" onclick="send_message({{$user->id}})">
                </div>
            </div>
        </div>
    </div>
</div>
@stop