<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use Illuminate\Http\Request;
use App\Exports\AssessmentsExport;
use Maatwebsite\Excel\Facades\Excel;

class ResultController extends Controller
{
    public function index(Request $request){
        $query = $request->input('q', 'semua');        
        if ($query == 'siswa') {
            $assessment = Assessment::whereNotNull('user_id')->get();
        } elseif ($query == 'umum') {
            $assessment = Assessment::whereNull('user_id')->get();
        } else {
            $assessment = Assessment::all();
        }
        
        $data = [
            'title' => 'Hasil',
            'subTitle' => null,
            'assessment' => $assessment
        ];
        return view('pages.result.index', $data);
    }
    
    public function export(Request $request)
    {
        $query = $request->input('q', 'semua'); // Ambil pilihan filter dari request
        return Excel::download(new AssessmentsExport($query), 'assessments.xlsx');
    }
}
