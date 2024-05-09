<?php

namespace App\Http\Controllers\Platform;

use App\Http\Controllers\Controller;
use App\Models\Platform;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Platform $platform_id) {
        $platform = Platform::find($platform_id);
        return view('platforms.show', compact('platform'));
    }
}
