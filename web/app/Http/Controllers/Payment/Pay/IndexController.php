<?php

namespace App\Http\Controllers\Payment\Pay;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke() {

        return view('payment.pay');
    }
}
