<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Param;
use App\Models\Platform;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function addParam(Request $request) {
        $user = Auth::user();
        if(!$user) {
            return view("error", ['message' => 'Войдите в аккаунт']);            
        }
        if($user->status != 2) {
            return view("error", ['message' => 'У вас нет доступа']);
        }
        $platform_id = Category::where('id', $request->category_id)->first()->platform_id;
        $data = [
            'title' => $request->title,
            'type' => $request->type,
            'attr' => $request->attr,
            'status' => 1,
            'category_id'=> $request->category_id,
            'platform_id'=>$platform_id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
        Param::insert($data);
        return response("Успешно, параметр добавлен");
    }
    public function deleteParam(Request $request) {
        $user = Auth::user();
        if(!$user) {
            return view("error", ['message' => 'Войдите в аккаунт']);            
        }
        if($user->status != 2) {
            return view("error", ['message' => 'У вас нет доступа']);
        }
        $param_id = $request->param_id;
        
        if(Param::where('id', $param_id)->exists()) {
            $param = Param::where('id', $param_id)->first();
            $param->delete();
            return response('Успешно, параметр удален');
        }
        return response("Ошибка удаления");

    }
    public function deleteCategory(Request $request) {
        $user = Auth::user();
        if(!$user) {
            return view("error", ['message' => 'Войдите в аккаунт']);            
        }
        if($user->status != 2) {
            return view("error", ['message' => 'У вас нет доступа']);
        }
        $category_id = $request->category_id;

        if(Category::where('id', $category_id)->exists()) {

            $category = Category::find($category_id);
            $category->status = false;
            $category->save();

            return response('Категория удалена');
        }

        return response('error');
    }
    public function editCategory(Request $request) {
        $user = Auth::user();
        if(!$user) {
            return view("error", ['message' => 'Войдите в аккаунт']);            
        }
        if($user->status != 2) {
            return view("error", ['message' => 'У вас нет доступа']);
        }
        $id = $request->id;
        $name = $request->name;
        
        
        $category = Category::find($id);
        $category->name = $name;
        $category->save();
        return response("ok");
    }

    public function editUser(Request $request) {
        $user = Auth::user();
        if(!$user) {
            return view("error", ['message' => 'Войдите в аккаунт']);            
        }
        if($user->status != 2) {
            return view("error", ['message' => 'У вас нет доступа']);
        }
        $current_user = User::where('id', $request->user_id)->first();
        if($current_user) {
            if($current_user->login != $request->login) {
                $current_user->login = $request->login;
            }
            if($current_user->balance != $request->balance) {
                $current_user->balance = $request->balance;
            }
            if($current_user->status != $request->status) {
                $current_user->status = $request->status;
            }
            $current_user->save(); 
            return response("Успешно");
        } else {
            return response("Ошибка");
        }
        
    }
    public function addCategory(Request $request) {
        $user = Auth::user();
        if(!$user) {
            return view("error", ['message' => 'Войдите в аккаунт']);            
        }
        if($user->status != 2) {
            return view("error", ['message' => 'У вас нет доступа']);
        }
        $platform_id = $request->platform_id;
        $name = $request->name;
        $platform = Platform::where('id', $platform_id)->first();
        if(Category::where('name', $name)->where('platform_id', $platform->id)->exists()) {
            return response('Такая категория есть');
        }
        // return response(Category::where('name', $category_title)->where('platform_id', $platform->id)->count());
        $data = [
            'name' => $name,
            'platform_id' => $platform->id,
            'status' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
        Category::insert($data);
        return response('Успешно, категория добавлена');
    }

    public function addPlatform(Request $request) {
        $user = Auth::user();
        if(!$user) {
            return view("error", ['message' => 'Войдите в аккаунт']);            
        }
        if($user->status != 2) {
            return view("error", ['message' => 'У вас нет доступа']);
        }
        $platform_title = $request->title;
        if(Platform::where('title', $platform_title)->exists()) {
            return response('Ошибка, такая платформа уже есть');
        }
        // return response($img);
        $data = [
            'title' => $platform_title,
            'img' => $request->img,
            'status' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
        Platform::insert($data);
        return response('Успешно, платформа добавлена');
    }

    public function deletePlatform(Request $request) {
        $user = Auth::user();
        if(!$user) {
            return view("error", ['message' => 'Войдите в аккаунт']);            
        }
        if($user->status != 2) {
            return view("error", ['message' => 'У вас нет доступа']);
        }
        $platform_id = $request->platform_id;
        
        // return response($platform_id);
        if(Platform::where('id', $platform_id)->exists()) {
            $platform = Platform::where('id', $platform_id)->first();
            $platform->delete();
            return response('Платформа удалена');
        }

        return response('error');
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
        $user = Auth::user();
        if(!$user) {
            return view("error", ['message' => 'Войдите в аккаунт']);            
        }
        if($user->status != 2) {
            return view("error", ['message' => 'У вас нет доступа']);
        }

        return view("admin/platforms/platforms");
    }
}
