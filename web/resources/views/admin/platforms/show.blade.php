@extends('header')
@section('main')

<div class="secondary_text"><a href="{{route('admin.platform.index')}}">Назад</a></div>
<div class="main_text big mt-1">Платформа</div>

<div class="main_text middle mt-1" style="display: flex; align-items: center; gap: 1rem;"><img src="{{asset($platform->img)}}" alt="" style="width: 30px; height: 30px;">{{$platform->title}}<img src="{{asset('images/trash.svg')}}" class="delete-platform-submit" alt="" attr-platform-id={{$platform->id}} style="width: 20px; height: 20px; cursor: pointer;"></div>

@stop