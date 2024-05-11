@extends('header')
@section('main')

<div class="main_text big mt-1">Платформы</div>
<a href="{{route('admin.platform.create')}}"><img src="{{asset('images/add.svg')}}" style="width: 20px; height: 20px; cursor: pointer;"></img></a>
<div class="products_">
    @foreach ($platforms as $platform)
        <div class="platform box flex box flex">
            <img src="{{asset($platform->img)}}" alt="">
            <div class="secondary_text">{{$platform->title}}</div>
            <img src="{{asset('images/trash.svg')}}" class="delete-platform-submit" alt="" attr-platform-id={{$platform->id}} style="width: 20px; height: 20px; cursor: pointer;">
            <a href="{{route('admin.platform.show', $platform->id)}}"><img src="{{asset('images/pen.svg')}}" style="width: 20px; height: 20px; cursor: pointer;"></a>
        </div>
    @endforeach
</div>
@stop