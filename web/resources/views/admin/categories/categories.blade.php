@extends('header-admin')
@section('main')


<div class="main-title-inline">
    <div class="main-title">
        Категории
    </div>
    <img src="{{asset('images/add.svg')}}" onclick="openModal('addCategory')" style="cursor: pointer" alt="">
</div>


<div class="container-list">
    @php
        $categories = App\Models\Category::get();
    @endphp
    @foreach ($categories as $category)
        <div class="block-list">
            <div class="block-list-left">
                @php 
                    $platform = App\Models\Platform::where('id', $category->platform_id)->first();
                @endphp
                <span>{{$category->name}}</span>
                <div class="list-left-brand">
                    <img src="{{asset('images/'. $platform->img)}}" alt="">
                    <p>{{$platform->title}}</p>
                </div>
        
            </div>
            <div class="block-list-right">
                <div class="info-block" onclick="openModal('editCategory', {{$category->id}})">
                    <img src="{{asset('images/pen.svg')}}" alt="">
                </div>
                <div class="info-block">
                    <img src="{{asset('images/remove.svg')}}" alt="">
                </div>
            </div>
        </div>
    @endforeach
</div>
<div class="modal-wrapper" id="modal_add" style="display: none;">
    <div class="modal-container">
        <div class="modal">
            <div class="modal-header">
                <h3>Добавление</h3>
                <img src="{{asset('images/close.svg')}}" alt="">
            </div>
            <div class="modal-body">
                <div class="form">
                    <div class="input">
                        <input type="text" placeholder="Название">
                    </div>
                    <div class="select-main">
                        <div class="select">
                            <span>Выберите</span>
                            <img src="{{asset('images/expand_down.svg')}}" alt="">
                        </div>
                        <div class="select_opened hide">
                            @php 
                                $platforms = App\Models\Platform::where('status', 1)->get();
                            @endphp
                            <ul>
                                @foreach ($platforms as $platform)
                                    <li>
                                        <img src="{{asset('images/'. $platform->img)}}" alt="">
                                        <span>{{$platform->title}}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <button>Добавить</button>
                </div>
            </div>
        </div>
    </div>
</div>

@stop