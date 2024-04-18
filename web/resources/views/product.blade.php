@extends('header')
@section('main')
@php
$platform = App\Models\Platform::where('id', $product->platform_id)->first();
$category = App\Models\Category::where('id', $product->category_id)->first();
$seller = App\Models\User::where('id', $product->user_id)->first();
use Illuminate\Support\Facades\DB;
$totalReviews = DB::table('reviews')
    ->join('products', 'reviews.product_id', '=', 'products.id')
    ->where('products.user_id', $seller->id)
    ->count();
@endphp
<div class="product-platform flex">
    <img src="{{asset('images/' . $platform->img) }}" alt="">
    <div class="secondary_text">{{$platform->title}}</div>
    <div class="secondary_text">/</div>
    <div class="secondary_text">{{$category->name}}</div>
</div>
<div class="info-wrapper mt-1 flex">
    <div class="info-wrapper-left">
        <div class="info-block box no-hover">
            <div class="secondary_text">Краткое описание</div>
            <div class="main_text mt-04">{{$product->title}}</div>
            <div class="secondary_text mt-08">Подробное описание</div>
            <div class="main_text mt-04">{{$product->description}}</div>
        </div>
        <div class="info-seller flex box mt-1">
            <div class="info-seller-user flex">
                <img src="{{asset('images/' . $seller->avatar) }}" alt="avatar" class="avatar">
                <div class="info-seller-login">
                    <div class="main_text">
                        {{$seller->login}}
                    </div> 
                    <div class="secondary_text">
                        {{$totalReviews}} отзывов
                    </div>
                </div>
            </div>
            <div class="info-seller-stats flex">
                <div class="stat">
                    <div class="secondary_text">Проданных товаров</div>
                    <div class="main_text big">0</div>
                </div>
                <div class="stat">
                    <div class="secondary_text">Купленных товаров</div>
                    <div class="main_text big">0</div>
                </div>
                <div class="stat">
                    <div class="secondary_text">Жалоб</div>
                    <div class="main_text big">0</div>
                </div>
            </div>
        </div>
        <div class="comments box flex mt-1">
            <div class="main_text middle">
                Комментарии
            </div>
            <div class="input mt-04">
                <div class="secondary_text">Писать комментарии можно после покупки товара</div>
            </div>
            <div class="comment-body">
                
            </div>
        </div>
    </div>
    <div class="info-right flex">
        <div class="buy box">
            <button id="open-modal-buy">Купить {{$product->price}} ₽</button>
            <div class="secondary_text small mt-04">Продавец не сможет получить оплату до тех пор, пока вы не подтвердите выполнение им всех обязательств.</div>
        </div>
        <div class="chat-container box mt-1">
            <div class="chat-header flex">
                <div class="chat-getter flex">
                    <img src={{asset('images/' . $seller->avatar)}} alt="" class="avatar">
                    <div class="secondary_text">
                        {{$seller->login}}
                    </div> 
                </div>
                
                <div class="chat-report">
                    <div class="small_box">
                        <img src="{{asset('images/flag.svg')}}" alt="">
                    </div>
                </div>
            </div>
            <div class="chat-body flex" style="text-align: center; justify-content: center; align-items: center;">
                <div class="secondary_text">Напишите продавцу перед оплатой</div> 
            </div>
            <div class="chat-footer">

            </div>
        </div>
    </div>
</div>

<div class="modal-wrapper" style="display: none">
    <div class="modal" id="modal-buy">
        <div class="modal-header">
            <div class="main_text middle">Покупка</div>
            <img src="{{asset('images/close.svg')}}" class="close" alt="">
        </div>
        <div class="modal-body">
            <div class="form_col" style="margin-top: .5rem;">
                <div class="secondary_text">Способ оплаты</div>
                <div class="select" atr-select="null">
                    <div class="select-main">
                        <div class="secondary_text">Выберите способ оплаты</div>
                        <img src="{{asset('images/expand_down.svg')}}" alt="">
                    </div>
                    <div class="select-options" style="display: none">
                        <div class="select-option" value="method_pay1"> 
                            Баланс аккаунта
                        </div>
                        <div class="select-option" value="method_pay2">
                            Банковская карта
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="form_col">
                <button id="buy-submit">Подтвердить</button>
            </div>
            <div class="line mt-1"></div>
            
        </div>
    </div>
</div>
@stop