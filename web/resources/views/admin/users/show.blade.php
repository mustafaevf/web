@extends('header')
@section('main')

<div class="secondary_text"><a href="{{route('admin.user.index')}}">Назад</a></div>
<div class="main_text big mt-1">Пользователь</div>

<div class="main_text middle mt-1" style="display: flex; align-items: center; gap: 1rem;"><img src="{{asset($user->avatar)}}" alt="" style="width: 30px; height: 30px;">{{$user->login}}</div>

<form method="POST" action="{{route("admin.user.update", $user->id)}}">
    @csrf
    @method('PUT')
    <div class="form_col" style="margin-top: .5rem;">
        <div class="secondary_text">Баланас</div>
        <div class="input">
            <input type="number" min-number="0" max-number="99999" name="balance" autocomplete="address-level4" placeholder="Баланс" value="{{$user->balance}}">
        </div>
        <div class="secondary_text small danger" style="display: none;">Ошибка</div>
    </div>
    <div class="form_col" style="margin-top: .5rem;">
        <div class="secondary_text">Статус</div>
        <div class="input">
            <input type="number" min-number="0" max-number="3" name="status" autocomplete="address-level4" placeholder="Статус" value="{{$user->status}}">
        </div>
        <div class="secondary_text small danger" style="display: none;">Ошибка</div>
    </div>
    <div class="form_col">
        <button type="submit">Сохранить</button>
    </div>
</form>
@stop