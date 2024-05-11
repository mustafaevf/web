<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke($category_id) {
        $category = Category::find($category_id);
        // return response($param->title);
        $category->delete();
        return response('Удалилось');
    }
}
