<?php

namespace App\Http\Controllers\Admin\Platform;

use App\Http\Controllers\Controller;
use App\Models\Platform;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke() {
        $platforms = Platform::all();
        return view('admin.platforms.index', compact('platforms'));
    }
}
