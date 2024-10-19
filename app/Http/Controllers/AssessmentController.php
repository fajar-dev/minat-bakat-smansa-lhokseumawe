<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Assessment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class AssessmentController extends Controller
{
    public function student(){
        $data = [
            'title' => 'Assessment Student',
            'subTitle' => null,
            'page_id' => null,
            'questions' => Question::all(), 
        ];
        return view('main.assessment-student',  $data);
    }

    public function studentSubmit(Request $request){
        DB::table('assessments')->where(['user_id'=> Auth::user()->id])->delete();
        $assessment = new Assessment();
        $assessment->user_id  = Auth::user()->id;
        $assessment->name  = $request->name;
        $assessment->birth_date  = $request->birth_date;
        $assessment->hobby  = $request->hobby;
        $assessment->save();

        foreach ($request->result as $key => $result) {
            Answer::Insert([
                'assessment_id' => $assessment->id,
                'question_id' => $key,
                'value' => $result,
                'created_at' => Date::now()
            ]);
        }
    }

    public function studentGeneral(){
        $data = [
            'title' => 'Assessment Student',
            'subTitle' => null,
            'page_id' => null,
            'questions' => Question::all(), 
        ];
        return view('main.assessment-student',  $data);
    }
}
