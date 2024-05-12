<div class="user-top-avatar box flex" id="open-context-user">
    <img src="{{asset('/images/'.$user->avatar)}}" class="avatar">
    <div class="info flex">
        {{-- <div class="main_text middle">{{$user->login}}</div> --}}
        <div class="main_text small">{{FormateMoney($user->balance)}}</div>
    </div>
    <img src="{{asset('images/expand_down.svg')}}" style="width: 22px" alt="">
</div>