@extends('header')
@section('main')

<a href="{{route('index')}}" class="secondary_text color_primary middle">Назад</a>
<div class="main_text big mt-09">Платформы</div>
<div class="platforms flex">
    @foreach($platforms as $platform)
        <a href="/platforms/{{strtolower($platform->title)}}">
            <div class="platform box flex">
                <img src="{{ asset('images/' . $platform->img) }}" alt="">
                <div class="main_text middle">{{$platform->title}}</div>
            </div>
        </a>
    @endforeach
</div>

@stop