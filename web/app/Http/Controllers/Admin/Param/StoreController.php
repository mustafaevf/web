<?php

namespace App\Http\Controllers\Admin\Param;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Param\StoreRequest;
use App\Models\Category;
use App\Models\Param;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request) {
        $data = $request->validated();
        $platform_id = Category::find($data['category_id'])->first()->platform->id;
        $param = [
            'title' => $data['title'],
            'attr' => $data['attr'],
            'type' => $data['type'],
            'category_id' => $data['category_id'],
            'platform_id' => $platform_id
        ];
        Param::insert($param);
        return response('cool');    
    }
}
