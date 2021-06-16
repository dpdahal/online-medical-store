<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AjaxController extends FrontendController
{
    public function index(Request $request)
    {
        $criteria = $request->criteria;

        $productData = DB::table('products')
            ->leftJoin('categories', 'categories.id', '=', 'products.cat_id')
            ->select('categories.cat_name','products.*','products.id as product_id')
            ->where('products.name', 'like', "%$criteria%")
            ->orWhere('products.price', 'like', "%$criteria%")
            ->orWhere('categories.cat_name', 'like', "%$criteria%")
            ->get();
        $outPut = "<ul class='list-group'>";


        if (count($productData) > 0) {
            foreach ($productData as $product) {
                $outPut .= "<a href='".route('search-medicine-details').'/'.$product->product_id."'><li class='list-group-item'>" . $product->name . "</li></a>";

            }
            $outPut .= "</ul>";
            echo $outPut;

        } else {
            echo 'data not found';
        }


    }
}
