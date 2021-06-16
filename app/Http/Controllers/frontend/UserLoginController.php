<?php

namespace App\Http\Controllers\frontend;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserLoginController extends FrontendController
{
    public function showLoginForm(Request $request)
    {

        if ($request->isMethod('get')) {
            return view('frontend.login.user-login', $this->data);
        }


        if (isset($_POST['login_form']) && $request->isMethod('post')) {
            $this->validate($request, [
                'user_email' => 'required',
                'user_password' => 'required'

            ]);
            $email = $request->user_email;
            $password = $request->user_password;


            if (Auth::guard('web')->attempt(['email' => $email, 'password' => $password])) {
                return redirect()->intended(route('index'));
            } else {

                return redirect()->back()->with('error', 'Invalid Access');
            }


        }

    }


    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->intended(route('index'));
    }

    public function userSetting(Request $request)
    {
        if ($request->isMethod('get')) {
            $id = Auth::guard('web')->user()->id;
            $this->data('userData', User::findOrFail($id));
            return view($this->pagePath . 'users.user-setting', $this->data);
        }

        if ($request->isMethod('post')) {
            $criteria = $request->criteria;
            $this->validate($request, [
                'name' => 'required|min:3|max:50',
                'username' => 'required|min:3|', [
                    Rule::unique('users', 'username')->ignore($criteria)
                ],
                'email' => 'required|email|', [
                    Rule::unique('users', 'email')->ignore($criteria)
                ],
                'upload' => 'mimes:jpg,png,jpeg,gif'

            ]);


            $userObject = User::findOrFail($criteria);
            $userObject->name = $request->name;
            $userObject->username = $request->username;
            $userObject->email = $request->email;

            if ($request->hasFile('upload')) {
                $file = $request->file('upload');
                $ext = $file->getClientOriginalExtension();
                $imageName = md5(microtime()) . '.' . $ext;
                $uploadPath = public_path('backend/uploads/images/user/');
                if ($file->move($uploadPath, $imageName)) {
                    $userObject->image = $imageName;
                }

            }

            if ($userObject->save()) {
                return redirect()->back()->with('success', 'Information was successfully updated');
            }
        }


    }


    public function userPasswordChange(Request $request)
    {
        if ($request->isMethod('get')) {
            return view($this->pagePath . 'users.change-password', $this->data);
        }
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'old_password' => 'required',
                'password' => 'required|min:5|confirmed'

            ]);

            $oldPassword = $request->old_password;
            $id = Auth::guard('web')->user()->id;
            $users = User::findOrFail($id);
            $dbPassword = $users->password;
            if (Hash::check($oldPassword, $dbPassword)) {
                $users->password = bcrypt($request->password);
                if ($users->update()) {
                    return redirect()->back()->with('success', 'successfully change password');
                }

                return redirect()->back();
            } else {
                return redirect()->back()->with('error', 'Password not match');
            }


        }
    }

}


