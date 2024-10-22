<?php

namespace App\Http\Controllers;

use App\Models\User;
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
}
