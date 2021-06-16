<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class AdminLoginController extends Controller
{

    public function showLoginForm(Request $request)
    {

        if ($request->isMethod('get')) {
            return view('backend.login.admin-login');
        }

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'email' => 'required',
                'password' => 'required'

            ]);
            $email = $request->email;
            $password = $request->password;

            if (Auth::guard('admin')->attempt(['email' => $email, 'password' => $password])) {
                return redirect()->intended(route('@admin'));
            } else {
                return redirect()->back()->with('error', 'Invalid Access');
            }


        }

    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin-login');

    }


}
