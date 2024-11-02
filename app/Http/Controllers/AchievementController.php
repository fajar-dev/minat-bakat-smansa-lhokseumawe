<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AchievementController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Prestasi',
            'subTitle' => null,
            'page_id' => null,
            'achievement' => Achievement::where('user_id', Auth::user()->id)->get()
        ];
        return view('pages.achievement.index',  $data);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'activity_name' => 'required',
            'date' => 'required',
            'type' => 'required|in:Internasional,Nasional,Kabupaten/Kota,Kecamatan,Kelurahan/Desa/Gampong',
            'achievement_name' => 'required',
            'file_path' => 'required|mimes:jpeg,bmp,png,jpg,svg,png,pdf|max:2000',
        ]);
        if ($validator->fails()) {
            return redirect()->route('user')->with('error', 'validasi error')->withInput()->withErrors($validator);
        }

        $achievement = New Achievement();
        $achievement->user_id = Auth::user()->id;
        $achievement->activity_name = $request->activity_name;
        $achievement->date = $request->date;
        $achievement->type = $request->type;
        $achievement->achievement_name = $request->achievement_name;
        $achievement->file_path =  $request->file('file_path')->store('achievement', 'public');
        $achievement->save();
        return redirect()->route('achievement')->with('success','Berhasil menambahkan prestasi');
    }

    public function update($id, Request $request){
        $validator = Validator::make($request->all(), [
            'activity_name' => 'required',
            'date' => 'required',
            'type' => 'required|in:Internasional,Nasional,Kabupaten/Kota,Kecamatan,Kelurahan/Desa/Gampong',
            'achievement_name' => 'required',
            'file_path' => 'nullable|sometimes|mimes:jpeg,bmp,png,jpg,svg,png,pdf|max:2000',
        ]);
        if ($validator->fails()) {
            return redirect()->route('user')->with('error', 'validasi error')->withInput()->withErrors($validator);
        }

        $achievement = Achievement::where('id', $id)
        ->where('user_id', Auth::user()->id)
        ->firstOrFail();
    
        $achievement->activity_name = $request->activity_name;
        $achievement->date = $request->date;
        $achievement->type = $request->type;
        $achievement->achievement_name = $request->achievement_name;
        
        if ($request->hasFile('file_path')) {
            $achievement->file_path = $request->file('file_path')->store('achievement', 'public');
        }
        
        $achievement->save();
        return redirect()->route('achievement')->with('success','Berhasil mengubah prestasi');
    }

    public function destroy($id){
        $achievement = Achievement::findOrFail($id);
        $achievement->delete();
        return redirect()->back()->with('success','Berhasil menghapus prestasi');
    }

    public function student(){
        $data = [
            'title' => 'Prestasi Siswa',
            'subTitle' => null,
            'page_id' => null,
            'achievement' => Achievement::all()
        ];
        return view('pages.achievement.student',  $data);
    }
}
