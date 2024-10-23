<?php

namespace App\Http\Controllers;

use App\Models\User;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(){
        $data = [
            'title' => 'Login',
            'subTitle' => null,
            'page_id' => null
        ];
        return view('auth.login',  $data);
    }

    public function loginSubmit(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('login')->withInput()->withErrors($validator);
        }
    
        $email = $request->input('email');
        $password = $request->input('password');
    
        // Attempt to authenticate using the determined login type
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('login')->with('error', 'Username/Email and password are incorrect, please try again');
        }
    }
    

    public function register(){
        $data = [
            'title' => 'Register',
            'subTitle' => null,
            'page_id' => null,
        ];
        return view('auth.register',  $data);
    }

    public function registerSubmit(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);
        if ($validator->fails()) {
            return redirect()->route('register')->withInput()->withErrors($validator);
        }

        $user = new User();
        $user->name  = $request->name;
        $user->email  = $request->email;
        $user->password  = Hash::make($request->password);
        $user->save();

        Auth::login($user);

        return redirect()->route('registration.completed')->with('success', 'Congratulation!!, Your account registered successfully');
    }
    
    public function registrationCompleted(){
        $data = [
            'title' => 'Registration Completed',
            'subTitle' => null,
            'page_id' => null,
        ];
        return view('auth.registration-completed',  $data);
    }

    public function registrationCompletedSubmit(Request $request){
        $validator = Validator::make($request->all(), [
            'photo' => 'required|mimes:jpeg,bmp,png,jpg,svg,png|max:2000',
            'name' => 'required|string|max:255',
            'student_identity_number' => 'required|max:255|unique:users',
            'class' => 'required|string|max:255',
            'major' => 'required|string|max:255',
            'birth_date' => 'required|date|max:255',
            'hobby' => 'required|string|max:255',

        ]);
        if ($validator->fails()) {
            return redirect()->route('registration.completed')->withInput()->withErrors($validator);
        }

        $user = User::find(Auth::user()->id);
        $user->name  = $request->name;
        $user->student_identity_number  = $request->student_identity_number;
        $user->class  = $request->class;
        $user->major  = $request->major;
        $user->birth_date  = $request->birth_date;
        $user->hobby  = $request->hobby;
        $user->photo_path =  $request->file('photo')->store('user', 'public');
        $user->save();

        return redirect()->route('dashboard')->with('success', 'Congratulation!!, Your account registered successfully');
    }

    public function forgot(){
        $data = [
            'title' => 'Forget Password',
            'subTitle' => null,
            'page_id' => null
        ];
        return view('auth.forgot',  $data);
    }

    public function forgotSubmit(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|exists:users',
        ]);
        if ($validator->fails()) {
            return redirect()->route('forgot')->withInput()->withErrors($validator);
        }
        $token = Uuid::uuid4();
                DB::table('password_reset_tokens')->insert([
                    'email' => $request->email, 
                    'token' => $token, 
                ]); 
        Mail::send('email.forgetPassword', ['token' => $token, 'email' => $request->email], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });
        return redirect()->route('forgot')->with('success', 'Email sent successfuly, Please check your email for reset password');
    }

    public function reset($token){
        $cekToken = DB::table('password_reset_tokens')->where('token', '=', $token)->first();
        if (!$cekToken) {
            return redirect()->route('login')->with('error', 'Invalid token');
        }
        $data = [
            'user' => User::where('email', $cekToken->email)->firstOrFail(),
            'token' => $token,
            'title' => 'Reset Password',
            'subTitle' => null,
            'page_id' => null
        ];
        return view('auth.reset',  $data);
    }

    public function resetSubmit($token, Request $request){
        $updatePassword = DB::table('password_reset_tokens')->where(['email' => $request->email,'token' => $token])->first();
        if(!$updatePassword){
            return redirect()->route('login')->with('error','Token Invalid');
        }
        $validator = Validator::make($request->all(), [
            'password' => 'required|string|min:8',
        ]);
        if ($validator->fails()) {
            return redirect()->route('reset', $token)->withInput()->withErrors($validator);
        }
        User::where('email', $updatePassword ->email)->update(['password' => Hash::make($request->password)]);
        DB::table('password_reset_tokens')->where(['email'=> $request->email])->delete();
        return redirect()->route('login')->with('success','Congratulation!, Your password has been changed successfully');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }
}
