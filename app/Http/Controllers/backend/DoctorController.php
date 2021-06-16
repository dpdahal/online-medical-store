<?php

namespace App\Http\Controllers\backend;

use App\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class DoctorController extends BackendController
{

    public function index()
    {
        return view( 'home.home');
    }

    public function showDoctor()
    {
        $this->data('doctorData', Doctor::orderBy('id', 'DESC')->get());
        return view( $this->pagePath. 'doctor.show-doctor', $this->data);
    }

    public function addDoctor(Request $request)
    {

        if ($request->isMethod('get')) {
            return view($this->pagePath . 'doctor.add-doctor');
        }

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'name' => 'required|min:3|max:50',
                'email' => 'required|email|unique:doctors,email',
                'password' => 'required|min:5|max:20|confirmed',
                'upload' => 'required|mimes:jpg,png,jpeg,gif'

            ]);

            $doctorObj = new Doctor();
            $doctorObj->name = $request->name;
            $doctorObj->email = $request->email;
            $doctorObj->password = bcrypt($request->password);

            if ($request->hasFile('upload')) {
                $file = $request->file('upload');
                $ext = $file->getClientOriginalExtension();
                $imageName = md5(microtime()) . '.' . $ext;
                $uploadPath = public_path('backend/uploads/images/doctor/');
                if ($file->move($uploadPath, $imageName)) {
                    $doctorObj->image = $imageName;
                }

            }

            if ($doctorObj->save()) {
                return redirect()->route('show-doctor')->with('success', 'doctor was added');
            }
        }

    }
    public function deleteWithFile($id)
    {
        $criteria = $id;
        $doctor = Doctor::findOrFail($criteria);
        $fileName = $doctor->image;
        $deletePath = public_path('backend/uploads/images/doctor/' . $fileName);
        if (file_exists($deletePath) && is_file($deletePath)) {
            return unlink($deletePath);

        }

        return true;
    }

    public function doctorDelete(Request $request)
    {
        $id = $request->id;
        $doctor = Doctor::findOrFail($id);
        if ($this->deleteWithFile($id) && $doctor->delete()) {
            return redirect()->route('show-doctor')->with('success', 'doctor was deleted');
        }
    }

    public function doctorEdit(Request $request)
    {
        $id = $request->id;
        $getData = Doctor::findOrFail($id);
        $this->data('doctorData', $getData);
        return view($this->pagePath . 'doctor.edit-doctor', $this->data);


    }

    public function doctorEditAction(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->back();
        }

        if ($request->isMethod('post')) {
            $id = $request->criteria;
            $this->validate($request, [
                'name' => 'required|min:3|max:50',
                'email' => 'required|email|', [
                    Rule::unique('doctors', 'email')->ignore($id)
                ],
                'upload' => 'mimes:jpg,png,jpeg,gif'

            ]);

            $doctorObj = Doctor::findOrFail($id);
            $doctorObj->name = $request->name;
            $doctorObj->email = $request->email;
            $doctorObj->password = bcrypt($request->password);

            if ($request->hasFile('upload')) {
                $file = $request->file('upload');
                $ext = $file->getClientOriginalExtension();
                $imageName = md5(microtime()) . '.' . $ext;
                $uploadPath = public_path('backend/uploads/images/doctor/');
                if ($this->deleteWithFile($id) && $file->move($uploadPath, $imageName)) {
                    $doctorObj->image = $imageName;
                }

            }

            if ($doctorObj->update()) {
                return redirect()->route('show-doctor')->with('success', 'doctor was added');
            }
        }
    }



}
