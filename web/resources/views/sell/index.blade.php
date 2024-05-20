@extends('header')
@section('main')


<div class="main_text big mt-1">Добавление товара</div>


<form method="POST" action="{{route("sell.store")}}">
    @csrf
    <input type="hidden" name="category_id" value="{{$category->id}}">
    <input type="hidden" name="platform_id" value="{{$category->platform->id}}">
    <div class="form_col" style="margin-top: .5rem;">
        <div class="secondary_text">Краткое описание</div>
        <div class="input">
            <input type="text" min-length="0" max-length="50" name="title" autocomplete="address-level4" placeholder="Краткое описание">
        </div>
        <div class="secondary_text small danger" style="display: none;">Ошибка</div>
    </div>

    <div class="form_col" style="margin-top: .5rem;">
        <div class="secondary_text">Подробное описание</div>
        <textarea name="description" id="" name="desciption" placeholder="Подробное описание"></textarea>
        {{-- <div class="input">
            <input type="text" min-length="0" max-length="50" name="title" autocomplete="address-level4" placeholder="Краткое описание">
        </div> --}}
        <div class="secondary_text small danger" style="display: none;">Ошибка</div>
    </div>
    <div class="form_col" style="margin-top: .5rem;">
        <div class="secondary_text">Информация для покупателя</div>
        <textarea id="" name="info" placeholder="Информация для покупателя"></textarea>
        {{-- <div class="input">
            <input type="text" min-length="0" max-length="50" name="title" autocomplete="address-level4" placeholder="Краткое описание">
        </div> --}}
        <div class="secondary_text small danger" style="display: none;">Ошибка</div>
    </div>
    <div class="form_col" style="margin-top: .5rem;">
        <div class="secondary_text">Цена</div>
        <div class="input">
            <input type="number" min-number="0" max-number="50000" name="price" autocomplete="address-level4" placeholder="Цена">
        </div>
        <div class="secondary_text small danger" style="display: none;">Ошибка</div>
    </div>
    @if ($category->params->count() != 0)
        @foreach ($category->params as $param)
            <div class="form_col">
                <div class="secondary_text">{{$param->title}}</div>
                @if ($param->type == "choose_btn")
                    @php
                        $args = explode('|', $param->attr);
                    @endphp
                    <div class="choose_block flex">
                        @for ($i = 0; $i < count($args) - 1; $i++)
                            <div class="choose_btn box active">{{$args[$i]}}</div>
                            <div class="choose_btn box">{{$args[$i + 1]}}</div>
                        @endfor
                    </div>
                @endif
                @if ($param->type == "input")
                @php
                    $args = explode('|', $param->attr);
                    $min = explode('=', $args[1])[1];
                    $max = explode('=', $args[2])[1];
                    if(count($args) == 4) {
                        $placeholder = explode('=', $args[3])[1];
                    } else {
                        $placeholder = $param->title;
                    }
                @endphp
                    @if ($args[0] == "number")
                        <div class="input"><input type="number" min-number={{$min}} max-number={{$max}} placeholder={{$placeholder}}></div>
                    @else
                        <div class="input"><input type="text" min-length={{$min}} max-length={{$max}} placeholder={{$placeholder}}></div>
                    @endif
                    
                    <div class="secondary_text small danger" style="display: none;">Ошибка</div>
                @endif
            </div>
        @endforeach
    @endif
    <div class="form_col">
        <button type="submit">Добавить</button>
    </div>
</form>




@stop