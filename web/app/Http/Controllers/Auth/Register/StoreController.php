<?php

namespace App\Http\Controllers\Auth\Register;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Register\StoreRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request) {
        $data = $request->validated();

        if($data['repassword'] != $data['password']) {
            return response('Ошибка, пароли должны совпадать');
        }
        $existingUser = User::where('email', $data['email'])
        ->orWhere('login', $data['login'])
        ->exists();

        if($existingUser) 
        {
            return response('Ошибка, почта занята');
        }
        $data = [
            'login' => $data['login'],
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
        User::insert($data);
        return redirect('index');

    }
}
