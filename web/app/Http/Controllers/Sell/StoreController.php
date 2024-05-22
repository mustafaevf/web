<?php

namespace App\Http\Controllers\Sell;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sell\StoreRequest;
use App\Models\ParamProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $storeRequest) {
        $data = $storeRequest->validated();

        // $data['user_id'] = Auth::user()->id;

        $product = [
            'title' => $data['title'], 
            'description' => $data['description'],
            'price' => $data['price'],
            'info' => $data['info'],
            'img' => '',
            'category_id' => $data['category_id'],
            'platform_id' => $data['platform_id'],
            'user_id' => Auth::user()->id
        ];

        $product = Product::create($product);
        
        $params = explode(';', $data['params']);
        for ($i = 0; $i < count($params) - 1; $i++) {
            $param1 = explode(':', $params[$i]);
            $param_id = $param1[0];
            $param_value = $param1[1];
            $data = [
                'param_id' => $param_id,
                'product_id' => $product->id,
                'value' => $param_value
            ];
            ParamProduct::create($data);
        }

        return response('cool');    
        // dd($storeRequest);
        // $params = str_split($data['params'], );
    }
}
