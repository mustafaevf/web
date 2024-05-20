@extends('header')
@section('main')

<div class="main_text big mt-09">Категории</div>
<div class="platforms flex">
    @foreach($categories as $category)
    <a href="{{ route('sell.index', ['platform_title' => $category->platform->title, 'category_title' => $category->name]) }}">
            <div class="platform box flex">
                <div class="main_text middle">{{$category->name}}</div>
            </div>
        </a>
    @endforeach
</div>

@stop