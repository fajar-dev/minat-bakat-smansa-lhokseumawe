<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\OrganizationCategory;
use App\Models\Question;
use App\Models\Result;
use Illuminate\Http\Request;

class masterDataController extends Controller
{
    public function organization(){
        $data = [
            'title' => 'Data Master',
            'subTitle' => 'Ekstrakulikuler',
            'page_id' => null,
            'organization' => OrganizationCategory::with('organization')->get()
        ];
        return view('pages.master-data.organization',  $data);
    }

    public function question(){
        $data = [
            'title' => 'Data Master',
            'subTitle' => 'Pertanyaan',
            'page_id' => null,
            'question' => Question::all()
        ];
        return view('pages.master-data.question',  $data);
    }

    public function intelligenceType(){
        $data = [
            'title' => 'Data Master',
            'subTitle' => 'Tipe Kecerdasan',
            'page_id' => null,
            'type' => Result::where('category', 'intelligence')->get()
        ];
        return view('pages.master-data.intelligence-type',  $data);
    }

    public function personalityType(){
        $data = [
            'title' => 'Data Master',
            'subTitle' => 'Tipe Kepribadian',
            'page_id' => null,
            'type' => Result::where('category', 'personality')->get()
        ];
        return view('pages.master-data.personality-type',  $data);
    }
}
