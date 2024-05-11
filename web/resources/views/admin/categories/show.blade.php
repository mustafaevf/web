@extends('header')
@section('main')

<div class="secondary_text"><a href="{{route('admin.category.index')}}">Назад</a></div>
<div class="main_text big mt-1">Категория</div>

<div class="main_text middle mt-1" style="display: flex; align-items: center; gap: 1rem;"><img src="{{asset($category->platform->img)}}" alt="" style="width: 30px; height: 30px;">{{$category->name}}<img src="{{asset('images/trash.svg')}}" class="delete-category-submit" alt="" attr-category-id={{$category->id}} style="width: 20px; height: 20px; cursor: pointer;"></div>


<form method="POST" action="{{route("admin.category.update", $category->id)}}">
    @csrf
    @method('PUT')
    <div class="form_col" style="margin-top: .5rem;">
        <div class="secondary_text">Название категории</div>
        <div class="input">
            <input type="text" min-length="0" max-length="50" name="name" autocomplete="address-level4" placeholder="Название" value="{{$category->name}}">
        </div>
        <div class="secondary_text small danger" style="display: none;">Ошибка</div>
    </div>
    <div class="form_col">
        <button type="submit">Сохранить</button>
    </div>
</form>


<div class="line mt-1"></div>
<div class="main_text middle">Параметры</div>
@if ($category->params->count() != 0)
    @foreach ($category->params as $param)
        <div class="form_col">
            <div class="secondary_text">{{$param->title}} <img src="{{asset('images/trash.svg')}}" class="delete-params-submit" attr-param-id={{$param->id}} style="width: 20px; height: 20px; cursor: pointer;"></div>
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
<button class="mt-1 open-modal-add-params" attr-category-id={{$category->id}}>Добавить</button>

<div class="modal-wrapper" style="display: none">
    <div class="modal" id="modal-add-params">
        <div class="modal-header">
            <div class="main_text middle">Добавление дополнительных параметров</div>
            <img src="{{asset('images/close.svg')}}" class="close" alt="">
        </div>
        <div class="modal-body">
            <div class="form_col" style="margin-top: .5rem;">
                <div class="secondary_text">Заголовок</div>
                <div class="input">
                    <input type="text" min-length="0" max-length="50" id="add-params-title" autocomplete="address-level4" placeholder="Название">
                </div>
                <div class="secondary_text small danger" style="display: none;">Ошибка</div>
            </div>
            <div class="form_col" style="margin-top: .5rem;">
                <div class="secondary_text">Тип</div>
                <div class="select" id="add-params-type" attr-select="null">
                    <div class="select-main">
                        <div class="secondary_text">Выберите тип</div>
                        <img src="{{asset('images/expand_down.svg')}}" alt="">
                    </div>
                    <div class="select-options" style="display: none">
                        <div class="select-option" value="input"> 
                            Ввод
                        </div>
                        <div class="select-option" value="select">
                            Список
                        </div>
                        <div class="select-option" value="choose_btn">
                            Переключатели
                        </div>
                    </div>
                </div>
            </div>
            <div class="form_col" style="margin-top: .5rem;">
                <div class="secondary_text">Доп параметры</div>
                <div class="input">
                    <input type="text" id="add-params-attr"  placeholder="Дополнительные параметры">
                </div>
                <div class="secondary_text small danger" style="display: none;">Ошибка</div>
            </div>
            <div class="form_col">
                <button id="add-params-submit" attr-category-id=0>Сохранить</button>
            </div>
        </div>
    </div>
</div>
@stop