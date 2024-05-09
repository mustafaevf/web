<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Platform;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke() {
        $products = Product::where('status', 1)->get();

        return view('index', compact('products'));
    }
    // public function index() {
    //     $products = Product::where('status', 1)->get();

    //     return view('index', ['products' => $products, 'viewPlatform' => -1]);
    // }

    // public function viewPlatforms($platform_title) {
    //     $platform = Platform::where('title', ucfirst($platform_title))->where('status', 1)->first();
    //     if($platform->exists()) {
    //         $products = Product::where('platform_id', $platform->id)->get();
    //         return view('index', ['products' => $products, 'viewPlatform' => $platform->id]);
    //     } else {
    //         return view('error', ['message' => $platform->count()]);
    //     }
    // }
    // public function viewCategories($platform_title, $category) {
    //     $platform = Platform::where('title', ucfirst($platform_title))->where('status', 1)->first();
    //     if($platform->exists()) {
    //         $name = Translit(ucfirst($category), true);
    //         $category = Category::where('name', $name)->where('platform_id', $platform->id)->where('status', 1)->first();
    //         if($category->exists()) {
    //             $products = Product::where('platform_id', $platform->id)->where('category_id', $category->id)->get();
    //             return view('index', ['products' => $products, 'viewPlatform' => $platform->id]);
    //         } else {
    //             return view('error', ['message' => $name]);
    //         }
    //     }
    // }
}
