@extends('header-admin')
@section('main')


<div class="main-title">
    Пользователи
</div>


<div class="container-list">
    @php
        $users = App\Models\User::get();
    @endphp
    @foreach ($users as $user)
        <div class="block-list">
            <div class="block-list-left">
                {{$user->login}}
            </div>
            <div class="block-list-right">
                {{$user->balance}}
            </div>
        </div>
    @endforeach
</div>

@stop