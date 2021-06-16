<?php

namespace App\Http\Controllers\backend;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowUserController extends Controller
{

    public function showUser()
    {
        $this->data('userData', User::orderBy('id', 'DESC')->get());
        return view( 'backend.pages.user.show-user', $this->data);
    }

    public function userDelete(Request $request)
    {
        $id = $request->id;
        $user = User::findOrFail($id);
        if ($user->delete()) {
            return redirect()->route('show-user')->with('success', 'user was deleted');
        }
    }

}
