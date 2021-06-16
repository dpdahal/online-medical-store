<?php

namespace App\Http\Controllers\frontend;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductDetailController extends FrontendController
{
    public function index(Request $request){
        $id=$request->criteria;

        $this->data('productDetails',Product::where('id', $id)->first());
        return view('frontend.pages.product.product-details',$this->data);
    }

    public function searchDetails(Request $request)
    {
        $id = $request->criteria;
        $this->data('productDetails', Product::where('id', $id)->first());
        return view('frontend.pages.product.product-details', $this->data);

    }



}
