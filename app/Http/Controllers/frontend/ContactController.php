<?php

namespace App\Http\Controllers\frontend;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class ContactController extends FrontendController
{
    public function contact()
    {
        return view('frontend.pages.contact.contact', $this->data);
    }


    public function contactPost(Request $request)
    {


        if ($request->isMethod('post')) {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email',
                'topic' => 'required',
                'brand' => 'required',
                'message' => 'required'
            ]);
            Contact::create($request->all());
            $message = 'Message has been successfully send';

            return Response::json(['success' => $message], 200);

        }


    }

}
