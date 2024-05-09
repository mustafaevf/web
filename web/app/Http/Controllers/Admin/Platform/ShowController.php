<?php

namespace App\Http\Controllers\Admin\Platform;

use App\Http\Controllers\Controller;
use App\Models\Platform;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Platform $platform) {
        // $category = Category::find($category_id);
        return view('admin.platforms.show', compact('category'));
    }
}
