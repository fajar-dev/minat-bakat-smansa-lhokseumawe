<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\OrganizationCategory;
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
}
