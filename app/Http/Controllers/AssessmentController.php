<?php

namespace App\Http\Controllers;

use App\Models\Score;
use App\Models\Answer;
use App\Models\Result;
use App\Models\Question;
use App\Models\Assessment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Validator;

class AssessmentController extends Controller
{
    public function student(){
        $data = [
            'title' => 'Assessment Student',
            'subTitle' => null,
            'page_id' => null,
            'questions' => Question::all(), 
            'myAssessment' => Assessment::where('user_id', '=', Auth::user()->id)->first(),
        ];
        return view('main.assessment-student',  $data);
    }

    public function studentSubmit(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'birth_date' => 'required|date|max:255',
            'hobby' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        if($request->type == 'student'){
            DB::table('assessments')->where(['user_id'=> Auth::user()->id])->delete();
        }
        $assessment = new Assessment();
        if($request->type == 'student'){
            $assessment->user_id  = Auth::user()->id;
        }
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

        $data = $this->calculate($assessment->id);

        $assessmentUpdate = Assessment::find($assessment->id);
        $assessmentUpdate->results = json_encode($data['totals']);
        $assessmentUpdate->result_id = $data['lowest']['id'];
        $assessmentUpdate->save();

        return redirect()->route('assessment.result', $assessment->uuid);
    }

    public function general(){
        $data = [
            'title' => 'Assessment Student',
            'subTitle' => null,
            'page_id' => null,
            'questions' => Question::all(), 
        ];
        return view('main.assessment-general',  $data);
    }

    private function calculate($assessmentId) {
        $query = Assessment::where('id', $assessmentId)->with('answer.question')->first();
    
        $results = Result::all()->keyBy('id');
    
        $scores = Score::all()->groupBy('result_id');
    
        $totals = [];
        foreach ($results as $result) {
            $totals[$result->type] = 0;
        }
    
        foreach ($query->answer as $answer) {
            foreach ($scores as $result_id => $questions) {
                // Cek apakah pertanyaan ada di dalam daftar Score
                if ($questions->pluck('question_id')->contains($answer->question_id)) {
                    $totals[$results[$result_id]->type] += $answer->value;
                }
            }
        }
    
        $lowestType = null;
        $lowestValue = PHP_INT_MAX;
    
        foreach ($totals as $type => $total) {
            if ($total < $lowestValue) {
                $lowestValue = $total;
                $lowestType = $type;
            }
        }
    
        $resultData = [
            'totals' => $totals,
            'lowest' => [
                'id' => $results->firstWhere('type', $lowestType)->id ?? null,
                'type' => $lowestType,
                'value' => $lowestValue,
            ],
        ];
    
        return $resultData;
    }

    public function result($id){
        $data = [
            'title' => 'Hasil Tes',
            'subTitle' => null,
            'page_id' => null,
            'result' => Assessment::where('uuid', $id)->first(),
        ];
        return view('main.assessment-result',  $data);
    }
}
