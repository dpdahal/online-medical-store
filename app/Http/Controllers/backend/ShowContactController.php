<?php

namespace App\Http\Controllers\backend;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowContactController extends Controller
{
    public function showContact()
    {
        $this->data('contactData', Contact::orderBy('id', 'DESC')->get());
        return view( 'backend.pages.contact.show-contact', $this->data);
    }

    public function contactDelete(Request $request)
    {
        $id = $request->id;
        $contact = Contact::findOrFail($id);
        if ($contact->delete()) {
            return redirect()->route('show-contact')->with('success', 'contact was deleted');
        }
    }

}
