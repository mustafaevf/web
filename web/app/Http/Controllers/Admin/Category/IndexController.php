<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\FilterRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(FilterRequest $request) {
        $data = $request->validated();
        $query = Category::query();
        if(isset($data['platform_id'])) {
            $query->where('platform_id', $data['platform_id']);
        }
        $categories = $query->get();
        return view('admin.categories.index', compact('categories'));
    }
}
