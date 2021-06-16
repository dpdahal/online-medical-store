<?php

namespace App\Http\Controllers\backend;

use App\NewsCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class NewCategoryController extends BackendController
{

    public function index(Request $request)
    {
        if ($request->isMethod('get')) {
            $newsCategoryData = NewsCategory::orderBy('id', 'DESC')->get();
            $this->data('newsCategoryData', $newsCategoryData);
            return view($this->pagePath . 'news.show-news-category', $this->data);
        }
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'cat_name' => 'required|unique:news_categories,cat_name'
            ]);
            $catObject = new NewsCategory();
            $catObject->cat_name = $request->cat_name;
            if ($catObject->save()) {

                return redirect()->back()->with('success', 'category was inserted');
            }

        }

        return false;

    }

    public function delete(Request $request)
    {
        $criteria = $request->criteria;
        $res = NewsCategory::findOrFail($criteria);
        if ($res->delete()) {
            return redirect()->back()->with('success', 'Category was deleted');
        }

        return false;
    }

    public function edit(Request $request)
    {
        $criteria = $request->criteria;
        $res = NewsCategory::findOrFail($criteria);
        $this->data('categoryData', $res);
        return view($this->pagePath . 'news.edit-news-category', $this->data);

    }

    public function editAction(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->back();
        }

        if ($request->isMethod('post')) {
            $criteria = $request->criteria;
            $res = NewsCategory::findOrFail($criteria);
            $this->validate($request, [
                'cat_name' => 'required|', [
                    Rule::unique('news_categories', 'cat_name')->ignore($criteria)
                ]
            ]);

            $response = $res->cat_name = $request->cat_name;

            if ($res->update()) {
                return redirect()->route('show-news-category')->with('success', 'category was updated');
            }
        }
        return false;
    }

    public function updateStatus(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->back();
        }

        if ($request->isMethod('post')) {
            $criteria = $request->criteria;
            $admin = NewsCategory::findOrFail($criteria);

            if (isset($_POST['active'])) {
                $admin->status = 0;
            }
            if (isset($_POST['inactive'])) {
                $admin->status = 1;
            }

            if ($admin->update()) {
                return redirect()->route('show-news-category')->with('success', 'status was updated');

            }

        }

        return false;

    }
}
