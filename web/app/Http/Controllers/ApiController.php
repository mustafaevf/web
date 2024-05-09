<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Platform;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getCategories(Request $request) {
        $title = $request->platform_title;
        if($title == "") {
            return response("error");
        }
        if(Platform::where('title', $title)->where('status', 1)->first()->exists()) {
            $categories = Category::where('platform_id', Platform::where('title', $title)->where('status', 1)->first()->id)->where('status', 1)->get();
            return response($categories);
        }
    }

    public function getParams() {
        
    }
}
