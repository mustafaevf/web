<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index($product_id) {
        $product = Product::where('id', $product_id)->first();        
        return view('product', ['product' => $product]);
    }
    public function Add(Request $request)
    {
        $user = Auth::user();
        if(!$user) {
            return response('login please');
        }
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'info' => 'required',
            'price' => 'required',
            'category' => 'required'
        ]);
        // return response(Category::where('platform_id', $request->platform_id)->get());
        // return response(Category::where('platform_id', $request->platform_id)->where('name', $request->category)->exists());
        if(!Category::where('platform_id', $request->platform_id)->where('name', $request->category)->exists()) {
            return response("Ошиьба");    
        }
        
        $category_id = Category::where('platform_id', $request->platform_id)->where('name', $request->category)->first()->id;
        if($validated) 
        {
            // return response("ok");
            $data = [
                'title' => $request->title,
                'description' => $request->description,
                'info'=> $request->info,
                'price'=> $request->price,
                'img' => '',
                'status' => true,
                'category_id'=> $category_id,
                'platform_id' => $request->platform_id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'user_id' => $user->id
            ];

            // return response($data);
            
            Product::insert($data);
            return response('ok');
        }
    }

    public function Delete($product_id) {
        if(!Product::where('id', $product_id)->delete()) {
            return response('eroror delelte');
        }
        return response('oke');
    }
}
