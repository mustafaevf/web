@extends('header')
@section('main')

<div class="main_text big mt-1">Пользователи</div>

<table class="mt-1">
    <tr>
        <th>Логин</th>
        <th>Баланс</th>
        <th>Права</th>
        <th>Дата</th>
        <th>IP</th>
      </tr>
      @php
          $users = App\Models\User::get();
      @endphp
      @foreach ($users as $user)
      
            <tr>
                <td style="display: flex; align-items: center; justify-content: center; gap: .7rem"><a href="{{route('admin.user.show', $user)}}"><div class="secondary_text"><img style="width: 30px; height: 30px; border-radius: 100%;" src="{{asset('images/'.$user->avatar)}}">{{$user->login}} </div></a></td>
                <td>{{FormateMoney($user->balance)}}</td>
                <td>{{$user->status}}</td>
                <td>{{FormateDate($user->created_at)}}</td>
                <td>{{$user->status}}</td>
                
            </tr>
       
      @endforeach
      
</table>
<div class="modal-wrapper" style="display: none">
    <div class="modal" id="modal-edit-user">
        <div class="modal-header">
            <div class="main_text middle">Редактирование</div>
            <img src="{{asset('images/close.svg')}}" class="close" alt="">
        </div>
        <div class="modal-body">
            <div class="form_col" style="margin-top: .5rem;">
                <div class="secondary_text">Имя пользователя</div>
                <div class="input">
                    <input type="text" min-length="0" max-length="50" id="edit-user-login" autocomplete="address-level4" placeholder="Имя пользователя">
                </div>
                <div class="secondary_text small danger" style="display: none;">Ошибка</div>
            </div>
            <div class="form_col" style="margin-top: .5rem;">
                <div class="secondary_text">Баланс</div>
                <div class="input">
                    <input type="number" min-number="0" max-number="20000" id="edit-user-balance" placeholder="Баланас">
                </div>
                <div class="secondary_text small danger" style="display: none;">Ошибка</div>
            </div>
            <div class="form_col" style="margin-top: .5rem;">
                <div class="secondary_text">Статус</div>
                <div class="input">
                    <input type="number" min-number="0" max-number="3" id="edit-user-status" placeholder="Статус">
                </div>
                <div class="secondary_text small danger" style="display: none;">Ошибка</div>
            </div>
            <div class="form_col">
                <button id="edit-user-submit" attr-user-id=0>Сохранить</button>
            </div>
        </div>
    </div>
</div>
@stop