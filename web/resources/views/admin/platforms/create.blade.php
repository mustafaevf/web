@extends('header')
@section('main')

<div class="main_text big mt-1">Добавление платформы</div>


<form method="POST" action="{{route("admin.platform.store")}}" enctype="multipart/form-data">
    @csrf
    <div class="form_col" style="margin-top: .5rem;">
        <div class="secondary_text">Название</div>
        <div class="input">
            <input type="text" min-length="0" max-length="50" name="title" autocomplete="address-level4" placeholder="Название">
        </div>
        <div class="secondary_text small danger" style="display: none;">Ошибка</div>
    </div>
    <div class="form_col">
        <div class="secondary_text">Название</div>
        <input type="file" name="img" id="">
    </div>
    <div class="form_col">
        <button type="submit">Добавить</button>
    </div>
</form>


@stop