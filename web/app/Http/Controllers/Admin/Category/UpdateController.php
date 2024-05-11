<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(Request $request)  {
        $name = $request->name;
        $category = Category::find($request->category_id);
        $category->update(['name'=> $name]);
        return redirect(route('admin.category.show', $category));
    }
}
