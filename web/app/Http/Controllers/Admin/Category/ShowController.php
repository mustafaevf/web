<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Category $category) {
        // $category = Category::find($category_id);
        return view('admin.categories.show', compact('category'));
    }
}
