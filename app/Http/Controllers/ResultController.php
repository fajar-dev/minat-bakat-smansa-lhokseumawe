<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index(Request $request){
        $data = [
            'title' => 'Hasil',
            'subTitle' => null,
            'assessment' => Assessment::all()
        ];
        return view('pages.result.index',  $data);
    }
}
