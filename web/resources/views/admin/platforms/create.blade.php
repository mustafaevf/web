@extends('header')
@section('main')

<div class="main_text big mt-1">Добавление платформы</div>


<form method="POST" action="{{route("admin.platform.store")}}">
    @csrf
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
        <button>Добавить</button>
    </div>
</form>


@stop