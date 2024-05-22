@if ($params->count() != 0)
    @foreach ($params as $param)
        <div class="form_col param_settings" attr-id={{$param->id}}>
            <div class="secondary_text">{{$param->title}}</div>
            @if ($param->type == "choose_btn")
                @php
                    $args = explode('|', $param->attr);
                @endphp
                <div class="choose_block flex" >
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