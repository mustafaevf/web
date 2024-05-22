@extends('header')
@section('main')


<div class="main_text big mt-1">Добавление товара</div>

<input type="hidden" id="product-category_id" value="{{$category->id}}">
<input type="hidden" id="product-platform_id" value="{{$category->platform->id}}">
<div class="form_col" style="margin-top: .5rem;">
    <div class="secondary_text">Краткое описание</div>
    <div class="input">
        <input type="text" min-length="0" max-length="50" id="product-title" autocomplete="address-level4" placeholder="Краткое описание">
    </div>
    <div class="secondary_text small danger" style="display: none;">Ошибка</div>
</div>

<div class="form_col" style="margin-top: .5rem;">
    <div class="secondary_text">Подробное описание</div>
    <textarea name="description" id="product-description" placeholder="Подробное описание"></textarea>
    {{-- <div class="input">
        <input type="text" min-length="0" max-length="50" name="title" autocomplete="address-level4" placeholder="Краткое описание">
    </div> --}}
    <div class="secondary_text small danger" style="display: none;">Ошибка</div>
</div>
<div class="form_col" style="margin-top: .5rem;">
    <div class="secondary_text">Информация для покупателя</div>
    <textarea id="product-info" placeholder="Информация для покупателя"></textarea>
    {{-- <div class="input">
        <input type="text" min-length="0" max-length="50" name="title" autocomplete="address-level4" placeholder="Краткое описание">
    </div> --}}
    <div class="secondary_text small danger" style="display: none;">Ошибка</div>
</div>
<div class="form_col" style="margin-top: .5rem;">
    <div class="secondary_text">Цена</div>
    <div class="input">
        <input type="number" min-number="0" max-number="50000" id="product-price" autocomplete="address-level4" placeholder="Цена">
    </div>
    <div class="secondary_text small danger" style="display: none;">Ошибка</div>
</div>
@include('shared.param-product', ['params' => $category->params])
<div class="form_col">
    <button type="submit" id="add-product-submit">Добавить</button>
</div>





@stop