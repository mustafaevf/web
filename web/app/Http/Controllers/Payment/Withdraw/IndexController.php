<?php

namespace App\Http\Controllers\Payment\Withdraw;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke() {

        return view('payment.withdraw');
    }
}
