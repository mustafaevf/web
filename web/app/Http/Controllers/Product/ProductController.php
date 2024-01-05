<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ProductController extends Controller
{
    public function Add(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'info' => 'required',
            'price' => 'required',
            'category' => 'required'
        ]);
        if($validated) 
        {
            // 'category'=> $request->category,
            $data = [
                'title' => $request->title,
                'description' => $request->description,
                'info'=> $request->info,
                'price'=> $request->price,
                'img' => '',
                'status' => true,
                'platform_id' => $request->platform_id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];
            
            Product::insert($data);
            return response('ok');
        }
    }
}
