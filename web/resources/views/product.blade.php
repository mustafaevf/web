@extends('header')
@section('main')
<div class="main-title">
    {{$product->title}}
</div>
<div class="submain-text">
    @php
        $platform = App\Models\Platform::where('id', $product->platform_id)->first();
        $category = App\Models\Category::where('id', $product->category_id)->first();
    @endphp
    <a href="/">Главная</a>
    <span>/</span>
    <a href="/platform/{{strtolower($platform->title)}}">{{$platform->title}}</a>
    <span>/</span>
    <a href="/category/{{$category->id}}">{{$category->name}}</a>
</div>

@stop