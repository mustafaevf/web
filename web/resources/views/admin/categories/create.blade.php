@extends('header')
@section('main')

<div class="main_text big mt-1">Добавление категории</div>


<form method="POST" action="{{route("admin.category.store")}}">
    @csrf
    <div class="form_col" style="margin-top: .5rem;">
        <div class="secondary_text">Название категории</div>
        <div class="input">
            <input type="text" min-length="0" max-length="50" id="add-category-name" autocomplete="address-level4" placeholder="Название">
        </div>
        <div class="secondary_text small danger" style="display: none;">Ошибка</div>
    </div>
    <div class="form_col" style="margin-top: .5rem;">
        <div class="secondary_text">Платформа</div>
        <div class="select" id="add-category-platform_id" attr-select="null">
            <div class="select-main">
                <div class="secondary_text small">Выберите платформу</div>
                <img src="{{asset('images/expand_down.svg')}}" alt="">
            </div>
            <div class="select-options" style="display: none">
                @php
                    $platforms = App\Models\Platform::get();
                @endphp
                @foreach ($platforms as $platform)
                    <div class="select-option" value="{{$platform->id}}"> 
                        <img src="{{asset('images/'. $platform->img)}}" alt="">{{$platform->title}}
                    </div>
                @endforeach
               
            </div>
        </div>
    </div>
    <div class="form_col">
        <button>Добавить</button>
    </div>
</form>


@stop