<?php

namespace App\Http\Controllers\Admin\Platform;

use App\Http\Controllers\Controller;
use App\Models\Platform;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke($platform_id) {
        $platform = Platform::find($platform_id);
        $platform->delete();
        return response('Удалилось');
    }
}
