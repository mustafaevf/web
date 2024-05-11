<?php

namespace App\Http\Controllers\Admin\Platform;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Platform\StoreRequest;
use App\Models\Platform;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(Request $request)  {
        $title = $request->title;
        $platform = Platform::find($request->platform_id);
        $platform->update(['title'=> $title]);
        return redirect(route('admin.platform.show', $platform));
    }
}
