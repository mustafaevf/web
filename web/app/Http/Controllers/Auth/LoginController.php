<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function store(Request $request) {
        $login = $request->username;
        $password = Hash::make($request->password);
        $existingUser = User::where('login', $request->username)->exists();
        if($existingUser) 
        {
            $checkPassword = User::where('login', $request->username)->first()->password;
            // return response($checkPassword);
            
            if(!Hash::check($request->password, $checkPassword)) 
            {
                return response('Пароли не совпадают');
            } 
            else {
                $user = User::where('login', $request->username)->first();
                Auth::loginUsingId($user->id);
                return response('ok');
            }
        } 
        else 
        {
            return response('Пользователь не найден');
        }

    }
}
