<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke($user_login) {
        $user = User::where('login', $user_login)->first();
        // if($user->exists()) {
            //     $products = Product::where('user_id', $user->first()->id);
            //     if($products->exists()) {
                //         $products = $products->get();
                //     } else {
                    //         $products = '';
                    //     }
                    
        return view('users.show', compact('user'));
        // } else {
        //     return view('error', ['message' => 'Пользователь не найден']);
        // }
    }

    // public function reviews($login) {
    //     $user = User::where('login', $login);
    //     $reviews = Review::join('products', 'reviews.product_id', '=', 'products.id')
    //                      ->where('products.user_id', $user->first()->id)
    //                      ->get();
    //     if($user->exists()) {
    //         return view('users/reviews', ['user' => $user->first(), 'reviews' => $reviews]);

    //     } else {
    //         return view('error', ['message' => 'Пользователь не найден']);
    //     }
    // }
}
