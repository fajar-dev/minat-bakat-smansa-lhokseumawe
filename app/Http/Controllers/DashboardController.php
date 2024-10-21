<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Dashboard',
            'subTitle' => null,
            'page_id' => null,
            'myAssessment' => Assessment::where('user_id', '=', Auth::user()->id)->first(),
        ];
        return view('pages.dashboard',  $data);
    }
}
