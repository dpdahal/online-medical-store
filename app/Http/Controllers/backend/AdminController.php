<?php

namespace App\Http\Controllers\backend;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminController extends BackendController
{

    public function index()
    {
        return view($this->pagePath . 'home.home');
    }

    public function showAdmin()
    {
        $this->data('adminData', Admin::orderBy('id', 'DESC')->get());
        return view($this->pagePath . 'admin.show-admin', $this->data);
    }

    public function addAdmin(Request $request)
    {

        if ($request->isMethod('get')) {
            return view($this->pagePath . 'admin.add-admin');
        }

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'name' => 'required|min:3|max:50',
                'email' => 'required|email|unique:admins,email',
                'password' => 'required|min:5|max:20|confirmed',
                'upload' => 'required|mimes:jpg,png,jpeg,gif'

            ]);

            $adminObj = new Admin();
            $adminObj->name = $request->name;
            $adminObj->email = $request->email;
            $adminObj->password = bcrypt($request->password);

            if ($request->hasFile('upload')) {
                $file = $request->file('upload');
                $ext = $file->getClientOriginalExtension();
                $imageName = md5(microtime()) . '.' . $ext;
                $uploadPath = public_path('backend/uploads/images/admin/');
                if ($file->move($uploadPath, $imageName)) {
                    $adminObj->image = $imageName;
                }

            }

            if ($adminObj->save()) {
                return redirect()->route('show-admin')->with('success', 'admin was added');
            }
        }
    }


    public function deleteWithFile($id)
    {
        $criteria = $id;
        $admin = Admin::findOrFail($criteria);
        $fileName = $admin->image;
        $deletePath = public_path('backend/uploads/images/admin/' . $fileName);
        if (file_exists($deletePath) && is_file($deletePath)) {
            return unlink($deletePath);

        }

        return true;
    }

    public function adminDelete(Request $request)
    {
        $id = $request->id;
        $admin = Admin::findOrFail($id);
        if ($this->deleteWithFile($id) && $admin->delete()) {
            return redirect()->route('show-admin')->with('success', 'admin was deleted');
        }
    }

    public function adminEdit(Request $request)
    {
        $id = $request->id;
        $admin = Admin::findOrFail($id);
        $this->data('adminData', $admin);
        return view($this->pagePath . 'admin.edit-admin', $this->data);


    }

    public function adminEditAction(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->back();
        }

        if ($request->isMethod('post')) {
            $id = $request->criteria;
            $this->validate($request, [
                'name' => 'required|min:3|max:50',
                'email' => 'required|email|', [
                    Rule::unique('admins', 'email')->ignore($id)
                ],
                'upload' => 'mimes:jpg,png,jpeg,gif'

            ]);

            $adminObj = Admin::findOrFail($id);
            $adminObj->name = $request->name;
            $adminObj->email = $request->email;

            if ($request->hasFile('upload')) {
                $file = $request->file('upload');
                $ext = $file->getClientOriginalExtension();
                $imageName = md5(microtime()) . '.' . $ext;
                $uploadPath = public_path('backend/uploads/images/admin/');
                if ($this->deleteWithFile($id) && $file->move($uploadPath, $imageName)) {
                    $adminObj->image = $imageName;
                }

            }

            if ($adminObj->update()) {
                return redirect()->route('show-admin')->with('success', 'admin was added');
            }
        }
    }
}