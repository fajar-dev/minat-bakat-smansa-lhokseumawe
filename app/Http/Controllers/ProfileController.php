<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Profil',
            'subTitle' => null,
            'page_id' => null
        ];
        return view('pages.profile.index',  $data);
    }

    public function profileUpdate(Request $request){
        $validator = Validator::make($request->all(), [
            'photo' => 'nullable|sometimes|mimes:jpeg,bsmp,png,jpg,svg,png|max:2000',
            'name' => 'required|string|max:255',
            'student_identity_number' => 'required|max:255',
            'class' => 'required|string|max:255',
            'major' => 'required|string|max:255',
            'birth_date' => 'required|date|max:255',
            'hobby' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return redirect()->route('profile')->with('error', 'Validation Error')->withInput()->withErrors($validator);
        }

        $profile =  User::find(Auth::user()->id);
        $profile->name  = $request->name;
        $profile->student_identity_number  = $request->student_identity_number;
        $profile->class  = $request->class;
        $profile->major  = $request->major;
        $profile->birth_date  = $request->birth_date;
        $profile->hobby  = $request->hobby;
        if($request->photo){
            $profile->photo_path =  $request->file('photo')->store('user', 'public');
        }
        $profile->save();

        return redirect()->route('profile')->with('success', 'Berhasil mengubah profil');
    }

    public function signinUpdate(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore(Auth::user()->id),
            ],
        ]);
        if ($validator->fails()) {
        return redirect()->route('profile')->with('error', 'Validation Error')->withInput()->withErrors($validator);
        }

        $profile =  User::find(Auth::user()->id);
        $profile->email = $request->input('email');
        $profile->save();

        return redirect()->route('profile')->with('success', 'Berhasil mengubah profil');
    }

    public function changePassword(Request $request){
        $user = Auth::user();
        $oldPassword = $request->input('oldPassword');
    
        if (!Hash::check($oldPassword, $user->password)) {
            return redirect()->route('profile')->with('error', 'Password lama salah');
        }
        
        $validator = Validator::make($request->all(), [
            'oldPassword' => 'required',
            'newPassword' => 'required|string|min:8',
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('profile')->with('error', 'Validation Error')->withErrors($validator);
        }
    
        $userSave = User::findOrFail($user->id);
        $userSave->password = Hash::make($request->input('newPassword'));
        $userSave->save();
    
        return redirect()->route('profile')->with('success', 'Berhasil mengubah password');
    }
}
