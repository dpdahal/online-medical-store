<?php

namespace App\Http\Controllers\frontend;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Session;

class AllProductController extends FrontendController
{
    public function showAllprouduct(Request $request)
    {

        if (request()->category) {
            $this->data('productData', product::with('categories')->whereHas('categories', function ($query) {
                $query->where('cat_name', request()->category);

            }))->get();
            $this->data('catData', Category::all());

        } else {
            $this->data('productData', Product::all());
            return view('frontend.pages.allproduct.all-product', $this->data);
        }


    }




    public function getByCriteria(Request $request)
    {
        $getCriteria = $request->criteria;

        $categoryData = DB::table('products')
            ->leftJoin('categories', 'categories.id', '=', 'products.cat_id')
            ->where('categories.cat_name', '=', $getCriteria)
            ->get();

        $this->data('productData', $categoryData);
        return view('frontend.pages.allproduct.all-product', $this->data);

    }




}
