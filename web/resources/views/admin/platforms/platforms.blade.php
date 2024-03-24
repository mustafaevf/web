@extends('header-admin')
@section('main')


<div class="main-title-inline">
    <div class="main-title">
        Платформы
    </div>
    <img src="{{asset('images/add.svg')}}" onclick="openModal('addPlatform')" style="cursor: pointer" alt="">
</div>


<div class="container-list">
    @php
        $platforms = App\Models\Platform::get();
    @endphp
    @foreach ($platforms as $platform)
        <div class="block-list">
            <div class="block-list-left">
                {{-- @php 
                    $platform = App\Models\Platform::where('id', $category->platform_id)->first();
                @endphp --}}
                {{-- <span>{{$category->name}}</span> --}}
                <div class="list-left-brand">
                    <img src="{{asset('images/'. $platform->img)}}" alt="">
                    <p>{{$platform->title}}</p>
                    @if (!$platform->status)
                        <span>Отключена</span>
                    @endif
                </div>
        
            </div>
            <div class="block-list-right">
                {{-- <div class="info-block" onclick="openModal('editPlatform', {{$platform->id}})">
                    <img src="{{asset('images/pen.svg')}}" alt="">
                </div> --}}
                <div class="info-block" onclick="admin_delete_platform({{$platform->id}})">
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
                        <input type="text" placeholder="Название" id="admin_add_platform-name">
                    </div>
                    
                    <button onclick="admin_add_platform()">Добавить</button>
                </div>
            </div>
        </div>
    </div>
</div>

@stop