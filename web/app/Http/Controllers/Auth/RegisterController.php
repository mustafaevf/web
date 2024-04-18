<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function store(Request $request) {
        if($request->repassword != $request->password) {
            return response('Ошибка, пароли должны совпадать');
        }
        $validated = $request->validate([
            'username' => 'required|max:255',
            'password' => 'required',
            'email' => 'required'
        ]);
        if($validated) 
        {
            $existingUser = User::where('email', $request->email)
            ->orWhere('login', $request->username)
            ->exists();

            if($existingUser) 
            {
                return response('Ошибка, почта занята');
            }
            $data = [
                'login' => $request->username,
                'password' => Hash::make($request->password),
                'email' => $request->email,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];
            User::insert($data);
            return response('ok');
        } 
        else 
        {
            return response('Ошибка, заполните все поля');
        }
        
    }
}
