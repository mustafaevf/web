<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(User $user) {
        // $category = Category::find($category_id);
        return view('admin.users.show', compact('user'));
    }
}
