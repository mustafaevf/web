<?php

namespace App\Http\Controllers\Platform;

use App\Http\Controllers\Controller;
use App\Models\Platform;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke() {
        $platforms = Platform::where('status', true)->get();
        return view('platforms.index', compact('platforms'));
    }
}
