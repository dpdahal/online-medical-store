<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WishListController extends FrontendController
{
    public function showWishlist(){
        return view('frontend.pages.wishlist.wish-list',$this->data);
    }
}
