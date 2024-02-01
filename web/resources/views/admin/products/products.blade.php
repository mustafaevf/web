@extends('header-admin')
@section('main')


<div class="main-title">
    Продукты
</div>


<div class="container-list">
    @php
        $products = App\Models\Product::get();
    @endphp
    @foreach ($products as $product)
        <div class="block-list">
            <div class="block-list-left">
                {{$product->title}}
            </div>
            <div class="block-list-right">
                {{$product->price}}
            </div>
        </div>
    @endforeach
</div>

@stop