@extends('header')
@section('main')

<div class="main_text big mt-1">Категории</div>
<span><a href="{{route('admin.category.create')}}">Добавить</a></span>
{{-- class="open-modal-add-category" --}}
<div class="products_">
    @foreach ($categories as $category)
        @php
            $platform = $category->platform;
            $parametrs = App\Models\Param::where('category_id', $category->id)->where('platform_id', $category->platform_id)->get();
        @endphp
        <div class=" platform box flex box flex">
            <div class="dropdown">
                <div class="dropdown-main">
                    <a href="{{route('admin.category.show', $category->id)}}"><div class="secondary_text" style="display: flex; align-items: center; gap: .5rem;"><img src="{{ asset('images/' . $platform->img) }}" alt="">{{$category->name}}</div></a>
                    <img src="{{asset('images/expand_down.svg')}}" alt="">
                </div>
                <div class="dropdown-options mt-1" style="display: none">
                    <div class="main_text big mt-1">Параметры</div>
                    @if ($parametrs->count() == 0)
                        <div class="secondary_text mt-1" >Параметров нет</div>
                    @else
                        @foreach ($parametrs as $param)
                            <div class="form_col">
                                <div class="secondary_text">{{$param->title}} <span class="delete-params-submit" attr-param-id={{$param->id}}>Удалить</span></div>
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
                </div>
            </div>
            
        </div>
    @endforeach
</div>
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
<div class="modal-wrapper" style="display: none">
    <div class="modal" id="modal-add-category">
        <div class="modal-header">
            <div class="main_text middle">Добавление категории</div>
            <img src="{{asset('images/close.svg')}}" class="close" alt="">
        </div>
        <div class="modal-body">
            <div class="form_col" style="margin-top: .5rem;">
                <div class="secondary_text">Название категории</div>
                <div class="input">
                    <input type="text" min-length="0" max-length="50" id="add-category-name" autocomplete="address-level4" placeholder="Название">
                </div>
                <div class="secondary_text small danger" style="display: none;">Ошибка</div>
            </div>
            <div class="form_col" style="margin-top: .5rem;">
                <div class="secondary_text">Платформа</div>
                <div class="select" id="add-category-platform_id" attr-select="null">
                    <div class="select-main">
                        <div class="secondary_text">Выберите платформу</div>
                        <img src="{{asset('images/expand_down.svg')}}" alt="">
                    </div>
                    <div class="select-options" style="display: none">
                        @php
                            $platforms = App\Models\Platform::get();
                        @endphp
                        @foreach ($platforms as $platform)
                            <div class="select-option" value="{{$platform->id}}"> 
                                <img src="{{asset('images/'. $platform->img)}}" alt="">{{$platform->title}}
                            </div>
                        @endforeach
                       
                    </div>
                </div>
            </div>
            <div class="form_col">
                <button id="add-category-submit">Добавить</button>
            </div>
        </div>
    </div>
</div>
@stop