<?php

namespace App\Http\Controllers\frontend;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends FrontendController
{
    public function showCart()
    {

        $userId = Auth::guard('web')->user()->id;
        $cardData = DB::table('carts')
            ->leftJoin('products', 'products.id', '=', 'carts.product_id')
            ->select('carts.*', 'products.name', 'products.image')
            ->where('carts.user_id', '=', $userId)
            ->get();
        $totalQuantity = DB::table('carts')
            ->where('carts.user_id', '=', $userId)
            ->sum('quantity');
        $catsData = DB::table('carts')->where('user_id', '=', $userId)
            ->groupBy('carts.id')
            ->get();
        $totalAmount = 0;
        foreach ($catsData as $cart) {
            $totalAmount = $totalAmount + $cart->price * $cart->quantity;

        }

        $this->data('cardData', $cardData);
        $this->data('totalPrice', $totalAmount);
        return view('frontend.pages.cart.cart', $this->data);
    }

    public function addCart(Request $request)
    {

        if ($request->isMethod('post')) {
            $product_id = $request->product_id;
            $product = Product::findOrFail($product_id);
            $price = $product->price;
            $quantity = $request->quantity;
            $userId = Auth::guard('web')->user()->id;
            $data['product_id'] = $product_id;
            $data['user_id'] = $userId;
            $data['price'] = $price;
            $data['quantity'] = $quantity;

            //user_id', 'product_id', 'cat-id', 'price', 'quantity', 'session_id'

            if (Cart::create($data)) {
                return redirect()->route('cart')->with('success', 'Product was added to card');
            }

        }


    }


    protected function removeProduct(Request $request)
    {
        $criteria = $request->criteria;
        $getResponse = Cart::findOrFail($criteria);
        if ($getResponse->delete()) {
            return redirect()->back()->with('success', 'Order was successfully deleted');
        }
    }
}
