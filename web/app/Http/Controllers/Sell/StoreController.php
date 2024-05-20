<?php

namespace App\Http\Controllers\Sell;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sell\StoreRequest;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(Request $storeRequest) {
        // $data = $storeRequest->validated();
        dd($storeRequest);
    }
}
