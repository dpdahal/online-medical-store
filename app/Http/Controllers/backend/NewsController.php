<?php

namespace App\Http\Controllers\backend;

use App\News;
use App\NewsCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class NewsController extends BackendController
{


    public function index()
    {
        $this->data('newsData', News::orderBy('id', 'DESC')->get());

        return view($this->pagePath . 'news.show-news', $this->data);


    }

    public function addNews(Request $request)
    {
        if ($request->isMethod('get')) {
            $this->data('newsCategoryData', NewsCategory::all());
            return view($this->pagePath . 'news.add-news', $this->data);

        }
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'title' => 'required',
                'slug' => 'required'

            ]);
            $data['title'] = $request->title;
            $data['slug'] = $request->slug;
            $data['date'] = $request->date;
            $data['status'] = $request->status;
            $data['details'] = $request->details;
            $data['meta_keywords'] = $request->keywords;
            $data['description'] = $request->summary;
            $data['cat_id'] = $request->cat_id;
            if ($request->hasFile('upload')) {
                $file = $request->file('upload');
                $ext = $file->getClientOriginalExtension();
                $imageName = md5(microtime()) . '.' . $ext;
                $uploadPath = public_path('backend/uploads/images/news/');
                if (!$file->move($uploadPath, $imageName)) {
                    return redirect()->back();
                }

                $data['image'] = $imageName;

            }

            if (News::create($data)) {

                return redirect()->route('admin-news')->with('success', 'news was inserted');
            }
        }


    }


    public function updateNewsStatus(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->back();
        }

        if ($request->isMethod('post')) {
            $criteria = $request->criteria;
            $result = News::findOrFail($criteria);
            if (isset($_POST['enable'])) {
                $result->status = 0;

            }
            if (isset($_POST['disable'])) {
                $result->status = 1;
            }


            if ($result->update()) {
                return redirect()->back()->with('success', 'news was inserted');
            }
        }


    }

    public function DeleteFile($criteria)
    {
        $id = $criteria;
        $findData = News::findOrFail($id);
        $fileFileName = $findData->image;
        $deletePath = public_path('backend/uploads/images/news/' . $fileFileName);
        if (file_exists($deletePath) && is_file($deletePath)) {
            return unlink($deletePath);
        }

        return true;
    }

    public function deleteNews(Request $request)
    {
        $id = $request->criteria;
        $findData = News::findOrFail($id);
        if ($this->DeleteFile($id) && $findData->delete()) {
            return redirect()->route('admin-news')->with('success', 'news was deleted');
        }

        return false;

    }


    public function editNews(Request $request)
    {
        $id = $request->criteria;
        $newData = News::findOrFail($id);
        $this->data('newsData', $newData);
        return view($this->pagePath . 'news.edit-news', $this->data);

    }

    public function editNewsAction(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->back();
        }

        if ($request->isMethod('post')) {
            $id = $request->criteria;
            $this->validate($request, [
                'title' => 'required|', [
                    Rule::unique('news', 'title')->ignore($id)
                ],
                'slug' => 'required|', [
                    Rule::unique('news', 'slug')->ignore($id)
                ]

            ]);
            $data['title'] = $request->title;
            $data['slug'] = $request->slug;
            $data['date'] = $request->date;
            $data['status'] = $request->status;
            $data['details'] = $request->details;
            $data['meta_keywords'] = $request->keywords;
            $data['description'] = $request->summary;
            if ($request->hasFile('upload')) {
                $file = $request->file('upload');
                $ext = $file->getClientOriginalExtension();
                $imageName = md5(microtime()) . '.' . $ext;
                $uploadPath = public_path('backend/uploads/images/news/');
                if ($this->DeleteFile($id) && $file->move($uploadPath, $imageName)) {
                    $data['image'] = $imageName;
                }

            }

            $news = News::findOrFail($id);

            if ($news->update($data)) {

                return redirect()->route('admin-news')->with('success', 'news was updated');
            }
        }

    }
}
