<?php

namespace App\Http\Controllers\dashboard;

use App\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;


class DoctorLoginController extends Controller
{
    public function showLoginForm(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('dashboard.login.doctor-login');
        }

        if ($request->isMethod('post')) {
            $email = $request->email;
            $password = $request->password;

            if (Auth::guard('doctor')->attempt(['email' => $email, 'password' => $password])) {
                return redirect()->intended(route('doctor-dashboard'));
            } else {
                return redirect()->back()->with('error', 'Username & password not match');
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

    public function setting(Request $request)
    {
        if ($request->isMethod('get')) {
            $doctorData = Auth::guard('doctor')->user();
            $this->data('doctorData', $doctorData);
            return view('dashboard.pages.setting-doctor',$this->data);
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
                return redirect()->back()->with('success', 'doctor was added');
            }
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('doctor-login');
    }
}
