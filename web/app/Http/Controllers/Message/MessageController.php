<?php

namespace App\Http\Controllers\Message;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function viewMessages() {
        $user = Auth::user();
        if(!$user) {
            return view("error", ['message' => 'Войдите в аккаунт']);            
        }
        $chat_user = [];
        $chats = Message::where('sender_id', $user->id)->orWhere('getter_id', $user->id)->get();
        foreach($chats as $chat) {
            $dialog = 0;
            if($chat->getter_id == $user->id) {
                $dialog = $chat->sender_id;
                // $last_message = Message::where('sender_id', $dialog)->where('getter_id', $user->id)->orderBy('created_at')->first();
            

            }
            else if($chat->sender_id == $user->id) {
                $dialog = $chat->getter_id;
                // $last_message = Message::where('sender_id', $user->id)->where('getter_id', $dialog)->orderBy('created_at')->first();
                

            }
            
            if(!in_array(User::where('id', $dialog)->first(), $chat_user)) {
                $second_person = User::where('id', $dialog)->first();
                array_push($chat_user, $second_person);
            }
        }
        return view('messagePages/messages', ['chatUser' => $chat_user, 'mas' => $chat_user]);
    }
    public function index($user_id) {
        $user = Auth::user();
        if(!$user) {
            return view("error", ['message' => 'Войдите в аккаунт']);            
        }
        if(User::where('id', $user_id)->exists()) {
            $getter_user = User::where('id', $user_id)->first();
            $messages = Message::where(function($query) use ($getter_user, $user) {
                $query->where('sender_id', $getter_user->id)
                      ->where('getter_id', $user->id);
            })->orWhere(function($query) use ($getter_user, $user) {
                $query->where('sender_id', $user->id)
                      ->where('getter_id', $getter_user->id);
            })->get(); 
            $chat_user = [];
            $chats = Message::where('sender_id', $user->id)->orWhere('getter_id', $user->id)->get();
            foreach($chats as $chat) {
                $dialog = 0;
                if($chat->getter_id == $user->id) {
                    $dialog = $chat->sender_id;
                    // $last_message = Message::where('sender_id', $dialog)->where('getter_id', $user->id)->orderBy('created_at')->first();
                

                }
                else if($chat->sender_id == $user->id) {
                    $dialog = $chat->getter_id;
                    // $last_message = Message::where('sender_id', $user->id)->where('getter_id', $dialog)->orderBy('created_at')->first();
                    

                }
                
                if(!in_array(User::where('id', $dialog)->first(), $chat_user)) {
                    $second_person = User::where('id', $dialog)->first();
                    array_push($chat_user, $second_person);
                }
            }           
            return view('messagePages/message', ['user' => $getter_user, 'chatUser' => $chat_user, 'messages' => $messages]);

        } else {
            return view("error", ['message' => 'Аккаунта нет']);  
        }
    }
    public function sendMessage(Request $request) {
        $user = Auth::user();
        if(!$user) {
            return view("error", ['message' => 'Войдите в аккаунт']);            
        }
        $getter_id = $request->getter_id;
        $sender_id = $user->id;
        if(!User::where('id', $getter_id)->exists()) {
            return response('error');
        }
        // return response('cool');
        $data = [
            'sender_id' => $sender_id,
            'getter_id' => $getter_id,
            'message' => $request->message,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
        Message::insert($data);
        return response('ok');
    }
}
