<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function editCategory(Request $request) {
        $user = Auth::user();
        if($user) {
            // добавить проверку на права
            $id = $request->id;
            $name = $request->name;
            
            
            $category = Category::find($id);
            $category->name = $name;
            $category->save();
            return response("ok");
        }
    }
    public function pageUsers() {
        $user = Auth::user();
        if(!$user) {
            return view("error", ['message' => 'Войдите в аккаунт']);            
        }
        if($user->status != 2) {
            return view("error", ['message' => 'У вас нет доступа']);
        }
        return view("admin/users/users");
    }
    public function pageProducts() {
        $user = Auth::user();
        if(!$user) {
            return view("error", ['message' => 'Войдите в аккаунт']);            
        }
        if($user->status != 2) {
            return view("error", ['message' => 'У вас нет доступа']);
        }

        return view("admin/products/products");
    }

    public function pageCategories() {
        $user = Auth::user();
        if(!$user) {
            return view("error", ['message' => 'Войдите в аккаунт']);            
        }
        if($user->status != 2) {
            return view("error", ['message' => 'У вас нет доступа']);
        }
        return view("admin/categories/categories");
    }
    
    public function check() {
        

    }

    public function pagePlatforms() {
        
        return view("");
    }
}
