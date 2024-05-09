<?php

namespace App\Http\Controllers\Auth\Login;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Login\IndexRequest;
use App\Http\Requests\Auth\Login\StoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request) {
        $data = $request->validated();

        $password = Hash::make($data['password']);
        $existingUser = User::where('login', $data['login'])->exists();
        if($existingUser) 
        {
            $checkPassword = User::where('login', $data['login'])->first()->password;
            if(!Hash::check($request->password, $checkPassword)) 
            {
                return response('Пароли не совпадают');
            } 
            else {
                $user = User::where('login', $data['login'])->first();
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
