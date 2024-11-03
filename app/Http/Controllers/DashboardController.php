<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Assessment;
use App\Models\Achievement;
use App\Models\Organization;
use App\Models\Result;
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
            'studentCount' => User::where('role', 'user')->count(),
            'achievementCount' => Achievement::count(),
            'assessmentStudentCount' => Assessment::whereNotNull('user_id')->count(),
            'assessmentGeneralCount' => Assessment::whereNull('user_id')->count(),
            'organization' => Organization::withCount('organizationRegistration')->get(),
            'intelligence' => Result::where('category', 'intelligence')->withCount('intelligenceAssessment')->get(),
            'personality' => Result::where('category', 'personality')->withCount('personalityAssessment')->get()

        ];
        // dd($data);
        return view('pages.dashboard',  $data);
    }
}
