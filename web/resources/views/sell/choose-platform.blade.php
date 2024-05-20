@extends('header')
@section('main')


<div class="main_text big mt-09">Платформы</div>
<div class="platforms flex">
    @foreach($platforms as $platform)
        <a href={{route('sell.index', $platform->title)}}>
            <div class="platform box flex">
                <img src="{{ asset($platform->img) }}" alt="">
                <div class="main_text middle">{{$platform->title}}</div>
            </div>
        </a>
    @endforeach
</div>

@stop