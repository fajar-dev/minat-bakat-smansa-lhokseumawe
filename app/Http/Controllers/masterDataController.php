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
            'type' => Result::all()
        ];
        return view('pages.master-data.intelligence-type',  $data);
    }
}
