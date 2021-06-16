<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        dd($data);
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function register(Request $request){
        $input=$request->all();
        $validator = $this->validator($input);

        if ($validator->passes()){
            $user = $this->create($input)->toArray();
            $user['link']=str_random(40);

            dd($user);

            DB::table('users_activates')->insert(['user_id'=> $user['id'],'token'=>$user['link']]);
            Mail::send('emails.activation', $user, function($message) use ($user){
                $message->to($user['email']);
                $message->subject('www.hc-kr.com - Activation Code');
            });
            return redirect()->to('login')->with('success',"We sent activation code. Please check your mail.");
        }
        return back()->with('errors',$validator->errors());
    }

    public function userActivates($token){
        $check = DB::table('users_activates')->where('token',$token)->first();
        if(!is_null($check)){
            $user = User::find($check->user_id);
            if ($user->is_activated ==1){
                return redirect()->to('login')->with('success',"user are already actived.");

            }
            $user->update(['is_activate' => 1]);
            DB::table('users_ativates')->where('token',$token)->delete();
            return redirect()->to('login')->with('success',"user active successfully.");
        }
        return redirect()->to('login')->with('Warning',"your token is invalid");
    }
}
