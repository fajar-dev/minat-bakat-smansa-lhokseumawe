<?php

namespace App\Http\Controllers;

use App\Models\Score;
use App\Models\Answer;
use App\Models\Result;
use App\Models\Question;
use App\Models\Assessment;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use App\Models\OrganizationRegistration;
use App\Models\Riasec;
use Illuminate\Support\Facades\Validator;

class AssessmentController extends Controller
{
    public function student(){
        $data = [
            'title' => 'Assessment Siswa',
            'subTitle' => null,
            'page_id' => null,
            'questions' => Question::where('category', 'intelligence')->get(),
            'riasecI' => Riasec::where('section', 1)->with(['result', 'question'])->get(), 
            'riasecII' => Riasec::where('section', 2)->with(['result', 'question'])->get(), 
            'riasecIII' => Riasec::where('section', 3)->with(['result', 'question'])->get(),
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

        $dataMis = $this->calculateMis($assessment->id);
        $dataRiasec = $this->calculateRiases($assessment->id);
        
        $assessmentUpdate = Assessment::find($assessment->id);
        $assessmentUpdate->mis_results = json_encode($dataMis['totals']);
        $assessmentUpdate->riasec_results = json_encode($dataRiasec['totals']);
        $assessmentUpdate->intelligence_id = $dataMis['lowest']['id'];
        $assessmentUpdate->personality_id = $dataRiasec['highest']['id'];
        $assessmentUpdate->save();

        return redirect()->route('assessment.result', $assessment->uuid);
    }

    public function general(){
        $data = [
            'title' => 'Assessment Umum',
            'subTitle' => null,
            'page_id' => null,
            'questions' => Question::where('category', 'intelligence')->get(),
            'riasecI' => Riasec::where('section', 1)->with(['result', 'question'])->get(), 
            'riasecII' => Riasec::where('section', 2)->with(['result', 'question'])->get(), 
            'riasecIII' => Riasec::where('section', 3)->with(['result', 'question'])->get(), 
        ];
        // return $data['riasecI'];
        return view('main.assessment-general',  $data);
    }

    private function calculateMis($assessmentId) {
        $query = Assessment::where('id', $assessmentId)
        ->whereHas('answer.question', function($query) {
            $query->where('category', 'intelligence');
        })
        ->with('answer.question')
        ->first();

        $results = Result::all()->keyBy('id')->where('category', 'intelligence');
    
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

    private function calculateRiases($assessmentId) {
        $query = Assessment::where('id', $assessmentId)
            ->whereHas('answer.question', function($query) {
                $query->where('category', 'personality');
            })
            ->with('answer.question')
            ->first();
    
        $results = Result::all()->keyBy('id')->where('category', 'personality');
        $scores = Riasec::all()->groupBy('result_id');
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
    
        $highestType = null;
        $highestValue = PHP_INT_MIN;
        foreach ($totals as $type => $total) {
            if ($total > $highestValue) { 
                $highestValue = $total;
                $highestType = $type;
            }
        }
    
        $resultData = [
            'totals' => $totals,
            'highest' => [
                'id' => $results->firstWhere('type', $highestType)->id ?? null,
                'type' => $highestType,
                'value' => $highestValue,
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
            'organizationRegistration' => OrganizationRegistration::where('user_id', Auth::user()->id ?? null)->get(),
            'ekstrakulikuler' => Organization::all()
        ];
        // dd($data);
        return view('main.assessment-result',  $data);
    }
}
