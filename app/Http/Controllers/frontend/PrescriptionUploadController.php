<?php

namespace App\Http\Controllers\frontend;

use App\Contact;
use App\Prescription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class PrescriptionUploadController extends FrontendController
{
    public function showPescription()
    {
        return view('frontend.pages.prescription.prescription-upload', $this->data);


    }

    public function prescriptionUpload(Request $request)
    {


        if ($request->isMethod('post')) {
            $this->validate($request, [
                'name' => 'required',
                'number' => 'required',
                'upload' => 'required|mimes:jpg,png,jpeg,gif',
            ]);

            if ($request->hasFile('upload')) {
                $file = $request->file('upload');
                $ext = $file->getClientOriginalExtension();
                $imageName = md5(microtime()) . '.' . $ext;
                $uploadPath = public_path('backend/uploads/images/prescription/');
                if ($file->move($uploadPath, $imageName)) {
                    $image = $imageName;
                }

            }

            $data['name'] = $request->name;
            $data['phone_number'] = $request->number;
            $data['upload'] = $image;
            Prescription::create($data);
            $message = 'Prescription has been successfully send';

            return redirect()->back()->with('success', $message);

        }


    }


}
