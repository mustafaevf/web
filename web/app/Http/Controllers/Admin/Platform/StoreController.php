<?php

namespace App\Http\Controllers\Admin\Platform;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Platform\StoreRequest;
use App\Models\Platform;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)  {
        $data = $request->validated();
        $file = $request->img;
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $path = 'images/uploads/platform/';
        $file->move($path, $filename);
        $platform = [
            'title' => $data['title'],
            'img' => $path.$filename
        ];
        Platform::create($platform);
        return redirect(route('admin.platform.index'));
    }
}
