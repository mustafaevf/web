@extends('header')
@section('main')


<div class="secondary_text"><a href="{{route('admin.user.index')}}">Назад</a></div>
<div class="main_text big mt-1">Пользователь</div>

<div class="main_text middle mt-1" style="display: flex; align-items: center; gap: 1rem;"><img src="{{asset('images/'.$user->avatar)}}" alt="" style="width: 60px; height: 60px; border-radius: 100%">{{$user->login}}</div>

<div class="user-wrapper">
    <div class="smart_choose mt-1">
        <div class="smart_choose_el active">
            Предложения
        </div>
        <div class="smart_choose_el">
            Отзывы
        </div>
    </div>
</div>

{{-- {{dd($user->lio)}} --}}
{{-- <div class="user-title"> --}}
    {{-- <img src="{{asset('images/'. $user->avatar)}}" alt=""> --}}

    {{-- <div class="user-title-col">
        <div class="user-login">
            {{$user->login}}
        </div>
        <div class="user-register">
            Дата регистрации {{FormateDate($user->created_at)}}
        </div>
        <div class="user-rating">
            <div class="rating-star">
                @for ($i = 1; $i < 6; $i++)
                    <img src="{{asset('images/star_no.svg')}}" alt="">
                @endfor
            </div>
            <div class="rating-text">
                Всего отызвов <span>0</span>
            </div>
        </div>
    </div>
</div>
<div class="user-wrapper">
    <div class="user-wrapper_left">
        <div class="user-wrapper_left-header">
            <a href="/users/{{$user->login}}">Предложения</a>
            <a href="/users/{{$user->login}}/reviews">Отзывы</a>
        </div>
        <div class="lst">
            @php
                $products = '';
            @endphp
            @if ($products != '')
                @foreach ($products as $product)
                    <p>{{$product->title}}</p>
                @endforeach
            @else
                <h3>Ничего не найдено</h3>
            @endif
        </div>
    </div>
    <div class="user-dialog">
        <div class="message-chat-output_wrapper" style="border: 1px solid #f0f0f0; height: 600px">
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
            <div class="message-chat-output_wrapper-body" >
                <div class="message_wrapper">
                    @php
                        $sender_user = Auth::user();
                        $prev_date = '';
                        $messages = App\Models\Message::where(function($query) use ($sender_user, $user) {
                        $query->where('sender_id', $sender_user->id)
                            ->where('getter_id', $user->id);
                        })->orWhere(function($query) use ($sender_user, $user) {
                        $query->where('sender_id', $user->id)
                            ->where('getter_id', $sender_user->id);
            })->get(); 
                    @endphp
                    @if (count($messages) != 0)
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
                    @else
                        <h3>Начните диалог</h3>
                    @endif
                    
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
</div> --}}
@stop