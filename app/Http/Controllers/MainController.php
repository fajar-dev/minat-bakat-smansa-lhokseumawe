<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrganizationCategory;

class MainController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Beranda',
            'subTitle' => null,
            'page_id' => null,
            'organization' => OrganizationCategory::with('organization')->get()
        ];
        return view('main.index',  $data);
    }
}
