<?php

namespace App\Http\Controllers\backend;

use App\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    public function showBrand()
    {
        $this->data('brandData', Brand::orderBy('id', 'DESC')->get());
        return view( 'backend.pages.brand.show-brand', $this->data);
    }

    public function addBrand(Request $request)
    {

        if ($request->isMethod('get')) {
            return view( 'backend.pages.brand.add-brand');
        }
        if ($request->isMethod('post')){
            $this->validate($request,[
                'img'=> 'mimes:jpg,png,jpeg,gif'
            ]);

            $brandObj = new Brand();
            if ($request->hasFile('img')) {
                $file = $request->file('img');
                $ext = $file->getClientOriginalExtension();
                $imageName = md5(microtime()) . '.' . $ext;
                $uploadPath = public_path('backend/uploads/images/brand/');
                if ($file->move($uploadPath, $imageName)) {
                    $brandObj->img = $imageName;
                }

            }

            if ($brandObj->save()) {
                return redirect()->route('show-brand')->with('success', 'brand was added');
            }
        }




    }

    public function deleteWithFile($id)
    {
        $criteria = $id;
        $brand = Brand::findOrFail($criteria);
        $fileName = $brand->img;
        $deletePath = public_path('backend/uploads/images/brand/' . $fileName);
        if (file_exists($deletePath) && is_file($deletePath)) {
            return unlink($deletePath);

        }

        return true;
    }

    public function brandDelete(Request $request)
    {
        $id = $request->id;
        $brand = Brand::findOrFail($id);
        if ($this->deleteWithFile($id) && $brand->delete()) {
            return redirect()->route('show-brand')->with('success', 'brand was deleted');
        }
    }

}
