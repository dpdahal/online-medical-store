<?php

namespace App\Http\Controllers\backend;


use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class CategoryController extends BackendController
{
    public function index()
    {
        return view($this->pagePath . 'home.home');
    }

    public function showCategory()
    {
        $this->data('categoryData', Category::orderBy('id', 'DESC')->get());
        return view($this->pagePath . 'category.show-category', $this->data);
    }

    public function addCategory(Request $request)
    {

        if ($request->isMethod('get')) {
            return view($this->pagePath . 'category.add-category');
        }

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'cat_name' => 'required|unique:categories,cat_name',
            ]);

            $categoryObj = new Category();
            $categoryObj->cat_name = $request->cat_name;


            if ($categoryObj->save()) {
                return redirect()->route('show-category')->with('success', 'category was added');
            }
        }
    }



    public function categoryDelete(Request $request)
    {
        $id = $request->id;
        $category = Category::findOrFail($id);
        if ($category->delete()) {
            return redirect()->route('show-category')->with('success', 'category was deleted');
        }
    }

    public function categoryEdit (Request $request)
    {
        $id = $request->id;
        $category = Category::findOrFail($id);
        $this->data('categoryData', $category);
        return view($this->pagePath . 'category.edit-category', $this->data);


    }

    public function categoryEditAction(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->back();
        }

        if ($request->isMethod('post')) {
            $id = $request->criteria;
            $this->validate($request, [
                'cat_name' => 'required',
            ]);

            $categoryObj = Category::findOrFail($id);
            $categoryObj->cat_name = $request->cat_name;



            if ($categoryObj->update()) {
                return redirect()->route('show-category')->with('success', 'category was added');
            }
        }
    }

}
