<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\OrganizationRegistration;
use Illuminate\Support\Facades\Validator;

class OrganizationController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'organization_id' => 'required',
            'reason' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $existingRegistration = OrganizationRegistration::where('user_id', Auth::user()->id)
            ->where('organization_id', $request->organization_id)
            ->first();

        if ($existingRegistration) {
            return redirect()->back()->withInput()->withErrors(['organization_id' => 'Anda sudah terdaftar di ekstrakulikuler ini'])->with('error', 'Anda sudah terdaftar di ekstrakulikuler ini');
        }

        $registration = new OrganizationRegistration();
        $registration->user_id = Auth::user()->id;
        $registration->organization_id = $request->organization_id;
        $registration->reason = $request->reason;
        $registration->save();

        return redirect()->back()->with('success', 'Berhasil mendaftarkan ekstrakulikuler');
    }

    public function destroy($id){
        $user = OrganizationRegistration::where('id', $id)->where('user_id', Auth::user()->id)->firstOrFail();
        $user->delete();
        return redirect()->back()->with('success','Berhasil menghapus daftar ekstrakulikuler');
    }

}
