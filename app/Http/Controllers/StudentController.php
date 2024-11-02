<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\User;
use App\Models\Assessment;
use App\Models\OrganizationRegistration;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Siswa',
            'subTitle' => null,
            'page_id' => null,
            'student' => User::where('role', 'user')->get()
        ];
        return view('pages.student.index',  $data);
    }

    public function detail($id){
        $data = [
            'title' => 'Siswa',
            'subTitle' => 'Detail',
            'page_id' => null,
            'student' => User::where('id', $id)->firstOrFail(),
        ];
        return view('pages.student.detail',  $data);
    }

    public function assessment($id){
        $data = [
            'title' => 'Siswa',
            'subTitle' => 'Penilaian',
            'page_id' => null,
            'student' => User::where('id', $id)->firstOrFail(),
            'assessment' => Assessment::where('user_id', $id)->first()
        ];
        return view('pages.student.assessment',  $data);
    }

    public function organization($id){
        $data = [
            'title' => 'Siswa',
            'subTitle' => 'Ekstrakulikuler',
            'page_id' => null,
            'student' => User::where('id', $id)->firstOrFail(),
            'organizationRegistration' => OrganizationRegistration::where('user_id', $id)->get()
        ];
        return view('pages.student.organization',  $data);
    }

    public function achievement($id){
        $data = [
            'title' => 'Siswa',
            'subTitle' => 'Prestasi',
            'page_id' => null,
            'student' => User::where('id', $id)->firstOrFail(),
            'achievement' => Achievement::where('user_id', $id)->get()
        ];
        return view('pages.student.achievement',  $data);
    }
}
