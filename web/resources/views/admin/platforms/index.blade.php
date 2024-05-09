@extends('header')
@section('main')

<div class="main_text big mt-1">Платформы</div>
<a href="{{route('admin.platform.create')}}">Добавить</a>
<div class="products_">
    @foreach ($platforms as $platform)
        <div class="platform box flex box flex">
            <img src="{{asset('images/'.$platform->img)}}" alt="">
            <div class="secondary_text">{{$platform->title}}</div>
        </div>
    @endforeach
</div>
<div class="modal-wrapper" style="display: none">
    <div class="modal" id="modal-add-platform">
        <div class="modal-header">
            <div class="main_text middle">Добавление платформы</div>
            <img src="{{asset('images/close.svg')}}" class="close" alt="">
        </div>
        <div class="modal-body">
            <div class="form_col" style="margin-top: .5rem;">
                <div class="secondary_text">Название</div>
                <div class="input">
                    <input type="text" min-length="0" max-length="50" id="add-platform-img" autocomplete="address-level4" placeholder="Путь к img">
                </div>
                <div class="input">
                    <input type="text" min-length="0" max-length="50" id="add-platform-title" autocomplete="address-level4" placeholder="Название">
                </div>
                <div class="secondary_text small danger" style="display: none;">Ошибка</div>
            </div>
           
            <div class="form_col">
                <button id="add-platform-submit">Добавить</button>
            </div>
        </div>
    </div>
</div>
@stop