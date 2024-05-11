<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(Request $request)  {
        $status = $request->status;
        $balance = $request->balance;
        $user= User::find($request->user_id);
        $user->update(['status'=> $status, 'balance' => $balance]);
        return redirect(route('admin.user.show', $user));
    }
}
