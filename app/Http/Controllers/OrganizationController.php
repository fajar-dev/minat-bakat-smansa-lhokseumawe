<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\OrganizationRegistration;
use Illuminate\Support\Facades\Validator;

class OrganizationController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Ekstrakulikuler',
            'subTitle' => null,
            'page_id' => null,
            'ekstrakulikuler' => Organization::all(),
            'organizationRegistration' => OrganizationRegistration::where('user_id', Auth::user()->id)->get()
        ];
        return view('pages.organization.index',  $data);
    }

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

    public function destroy($id)
    {
        $user = OrganizationRegistration::where('id', $id);
        if (Auth::user()->role == 'user') {
            $user = $user->where('user_id', Auth::user()->id);
        }
        $user = $user->firstOrFail();
        $user->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus daftar ekstrakulikuler');
    }


    public function data($id){
        $organization = Organization::where('id', $id)->firstOrFail();
        $data = [
            'title' => 'Ekstrakulikuler',
            'subTitle' => $organization->name,
            'page_id' => null,
            'ekstrakulikuler' => Organization::all(),
            'organizationRegistration' => OrganizationRegistration::where('organization_id', $id)->get()
        ];
        return view('pages.organization.data',  $data);
    }

}
