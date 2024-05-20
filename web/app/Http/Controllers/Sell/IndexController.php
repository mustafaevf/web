<?php

namespace App\Http\Controllers\Sell;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Platform;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke($platform_title = null, $category_title = null) {
        if($platform_title == null) {
            $platforms = Platform::where('status', 1)->get();
            return view('sell.choose-platform', compact('platforms'));
        }
        if($category_title == null) {
            $categories = Platform::where('title', $platform_title)->first()->category;
            return view('sell.choose-category', compact('categories'));
        }
        if($platform_title != null && $category_title != null) {
            $category = Category::where('name', $category_title)->where('status', 1)->first();
            return view('sell.index', compact('category'));
        }
    }
}
