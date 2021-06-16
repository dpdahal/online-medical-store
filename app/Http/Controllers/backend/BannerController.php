<?php

namespace App\Http\Controllers\backend;

use App\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{

    public function showBanner()
    {
        $this->data('bannerData', Banner::orderBy('id', 'DESC')->get());
        return view('backend.pages.banner.show-banner', $this->data);
    }

    public function addBanner(Request $request)
    {

        if ($request->isMethod('get')) {
            return view('backend.pages.banner.add-banner');
        }
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'title' => 'required|unique:banners,title',
                'slug' => 'required|unique:banners,slug',
                'image' => 'required|mimes:jpg,png,jpeg,gif',
                'description' => 'required'
            ]);

            $bannerObj = new Banner();

            $bannerObj->title = $request->title;
            $bannerObj->slug = $request->slug;
            $bannerObj->description = $request->description;

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $imageName = md5(microtime()) . '.' . $ext;
                $uploadPath = public_path('backend/uploads/images/banner/');
                if ($file->move($uploadPath, $imageName)) {
                    $bannerObj->image = $imageName;
                }


            }


            if ($bannerObj->save()) {
                return redirect()->route('show-banner')->with('success', 'banner was added');
            }
        }


    }

    public function deleteWithFile($id)
    {
        $criteria = $id;
        $banner = Banner::findOrFail($criteria);
        $fileName = $banner->image;
        $deletePath = public_path('backend/uploads/images/banner/' . $fileName);
        if (file_exists($deletePath) && is_file($deletePath)) {
            return unlink($deletePath);

        }

        return true;
    }

    public function bannerDelete(Request $request)
    {
        $id = $request->id;
        $banner = Banner::findOrFail($id);
        if ($this->deleteWithFile($id) && $banner->delete()) {
            return redirect()->route('show-banner')->with('success', 'banner was deleted');
        }
    }


}
