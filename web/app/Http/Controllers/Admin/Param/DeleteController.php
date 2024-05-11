<?php

namespace App\Http\Controllers\Admin\Param;

use App\Http\Controllers\Controller;
use App\Models\Param;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke($param_id) {
        $param = Param::find($param_id);
        // return response($param->title);
        $param->delete();
        return response('Удалилось');
    }
}
