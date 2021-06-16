<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\frontend\FrontendController;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class RegisterController extends FrontendController
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function register(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->route('login');
        }

        if (isset($_POST['register_form']) && $request->isMethod('post')) {

            $input = $request->all();
            $validator = $this->validator($input);

            if ($validator->passes()) {
                $user = $this->create($input)->toArray();
                $user['link'] = str_random(40);


                DB::table('users_activates')->insert(['user_id' => $user['id'], 'token' => $user['link']]);
                Mail::send('mail.activation', $user, function ($message) use ($user) {
                    $message->to($user['email']);
                    $message->subject('www.hc-kr.com - Activation Code');
                });
                return redirect()->to('login')->with('success', "We sent activation code. Please check your mail.");
            }
            return back()->with('errors', $validator->errors());
        }

    }

    public function userActivates(Request $request)
    {

        $token = $request->token;

        $check = DB::table('users_activates')->where('token', $token)->first();
        if (!is_null($check)) {
            $user = User::find($check->user_id);
            if ($user->is_activated == 1) {
                return redirect()->to('login')->with('success', "user are already actived.");

            }
            $user->update(['is_activate' => 1]);
            DB::table('users_activates')->where('token', $token)->delete();
            return redirect()->to('login')->with('success', "user active successfully.");
        }
        return redirect()->to('login')->with('Warning', "your token is invalid");
    }

}

