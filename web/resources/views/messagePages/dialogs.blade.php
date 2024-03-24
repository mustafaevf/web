<div class="message-chat_list-chats">
    {{-- @php
        var_dump($chatUser[1]->message);
    @endphp --}}
    @foreach ($chatUser as $dialogUser)
        @php
            $user = Auth::user();
            $message = App\Models\Message::where(function($query) use ($dialogUser, $user) {
            $query->where('sender_id', $dialogUser->id)
                ->where('getter_id', $user->id);
            })->orWhere(function($query) use ($dialogUser, $user) {
                $query->where('sender_id', $user->id)
                    ->where('getter_id', $dialogUser->id);
            })->orderBy("created_at", "desc")->first();
        @endphp
    <a href="/messages/{{$dialogUser->id}}">
        <div class="message-chat">
            <div class="message-chat-avatar">
                <img src="{{asset('images/'.$dialogUser->avatar)}}">
            </div>
            <div class="message-chat-con">
                <div class="message-chat-login">
                    {{$dialogUser->login}}
                </div>
                <div class="message-chat-last_message">
                    {{$message->message}}
                </div>
            </div>
        </div>          
    </a>
    @endforeach
    
</div>