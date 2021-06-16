<?php

namespace App\Http\Controllers\backend;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends BackendController
{
    public function index()
    {
        return view($this->pagePath . 'home.home');
    }

    public function showProduct()
    {
        $this->data('productData', Product::orderBy('id', 'DESC')->get());
        return view($this->pagePath . 'product.show-product', $this->data);
    }

    public function addProduct(Request $request)
    {

        if ($request->isMethod('get')) {
            $this->data('categoryData', Category::all());
            return view($this->pagePath . 'product.add-product', $this->data);
        }

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'name' => 'required',
                'brand_name' => 'required',
                'price' => 'required',
                'mg' => 'required',
                'image' => 'required|mimes:jpg,png,jpeg,gif',
                'description' => 'required',
                'man_date' => 'required',
                'exp_date' => 'required'

            ]);

            $productObj = new Product();
            $productObj->name = $request->name;
            $productObj->brand_name = $request->brand_name;
            $productObj->price = $request->price;
            $productObj->mg = $request->mg;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $imageName = md5(microtime()) . '.' . $ext;
                $uploadPath = public_path('backend/uploads/images/product/');
                if ($file->move($uploadPath, $imageName)) {
                    $productObj->image = $imageName;
                }

            }
            $productObj->description = $request->description;
            $productObj->cat_id = $request->cat_id;
            $productObj->man_date = $request->man_date;
            $productObj->exp_date = $request->exp_date;


            if ($productObj->save()) {
                return redirect()->route('show-product')->with('success', 'product was added');
            }
        }
    }


    public function deleteWithFile($id)
    {
        $criteria = $id;
        $product = Product::findOrFail($criteria);
        $fileName = $product->image;
        $deletePath = public_path('backend/uploads/images/product/' . $fileName);
        if (file_exists($deletePath) && is_file($deletePath)) {
            return unlink($deletePath);

        }

        return true;
    }

    public function productDelete(Request $request)
    {
        $id = $request->id;
        $product = Product::findOrFail($id);
        if ($this->deleteWithFile($id) && $product->delete()) {
            return redirect()->route('show-product')->with('success', 'product was deleted');
        }
    }

    public function productEdit(Request $request)
    {
        $id = $request->id;
        $product = Product::findOrFail($id);
        $this->data('productData', $product);
        return view($this->pagePath . 'product.edit-product', $this->data);


    }

    public function productEditAction(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->back();
        }

        if ($request->isMethod('post')) {
            $id = $request->criteria;
            $this->validate($request, [
                'name' => 'required',
                'brand_name' => 'required',
                'price' => 'required',
                'mg' => 'required',
                'image' => 'mimes:jpg,png,jpeg,gif',
                'description' => 'required',
                'man_date' => 'required',
                'exp_date' => 'required'

            ]);


            $productObj = Product::findOrFail($id);
            $productObj->name = $request->name;
            $productObj->brand_name = $request->brand_name;
            $productObj->price = $request->price;
            $productObj->mg = $request->mg;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $imageName = md5(microtime()) . '.' . $ext;
                $uploadPath = public_path('backend/uploads/images/product/');
                if ($this->deleteWithFile($id) && $file->move($uploadPath, $imageName)) {
                    $productObj->image = $imageName;
                }
                $productObj->description = $request->description;
                $productObj->man_date = $request->man_date;
                $productObj->exp_date = $request->exp_date;

                if ($productObj->update()) {
                    return redirect()->route('show-product')->with('success', 'product was updated');
                }
            }
        }
    }
}