@extends('header')
@section('main')

<div class="main_text big mt-1">Категории</div>
<a href="{{route('admin.category.create')}}"><img src="{{asset('images/add.svg')}}" style="width: 20px; height: 20px; cursor: pointer;"></img></a>
{{-- class="open-modal-add-category" --}}
@php
$platforms = App\Models\Platform::where('status', 1)->get();
@endphp
<div class="platforms flex">
    <a href="{{route('admin.category.index')}}">
        <div class="platform box flex">
            <div class="main_text middle">Все</div>
        </div>
    </a>

@foreach($platforms as $platform)
    <a href="{{route('admin.category.index')}}?platform_id={{$platform->id}}">
        <div class="platform box flex">
            <img src="{{ asset($platform->img) }}" alt="">
            <div class="main_text middle">{{$platform->title}}</div>
        </div>
    </a>


@endforeach
</div>
<div class="products_">
    @foreach ($categories as $category)
        @php
            $platform = $category->platform;
        @endphp
        <div class="platform box flex box flex">
            <img src="{{asset($platform->img)}}" alt="">
            <div class="secondary_text">{{$category->name}}</div>
            <img src="{{asset('images/trash.svg')}}" class="delete-category-submit" alt="" attr-category-id={{$category->id}} style="width: 20px; height: 20px; cursor: pointer;">
            <a href="{{route('admin.category.show', $category->id)}}"><img src="{{asset('images/pen.svg')}}" style="width: 20px; height: 20px; cursor: pointer;"></a>
        </div>
    @endforeach
</div>

<div class="modal-wrapper" style="display: none">
    <div class="modal" id="modal-add-category">
        <div class="modal-header">
            <div class="main_text middle">Добавление категории</div>
            <img src="{{asset('images/close.svg')}}" class="close" alt="">
        </div>
        <div class="modal-body">
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
                        <div class="secondary_text">Выберите платформу</div>
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
                <button id="add-category-submit">Добавить</button>
            </div>
        </div>
    </div>
</div>
@stop