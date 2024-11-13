<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Question;
use App\Models\Organization;
use Illuminate\Http\Request;
use App\Models\OrganizationCategory;
use App\Models\Recomended;
use Illuminate\Support\Facades\Validator;

class masterDataController extends Controller
{
    public function organization(){
        $data = [
            'title' => 'Data Master',
            'subTitle' => 'Ekstrakulikuler',
            'page_id' => null,
            'organization' => OrganizationCategory::with('organization')->get(),
            'organizations' => Organization::all()->map(function($organization) {
                $organization->coach = json_decode($organization->coach, true);
                return $organization;
            })
        ];
        return view('pages.master-data.organization',  $data);
    }

    public function organizationStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'organization_category_id' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('master-data.organization')->with('error', 'Gagal menambahkan data')->withInput()->withErrors($validator);
        }
        
        $organization = New Organization();
        $organization->organization_category_id = $request->input('organization_category_id');
        $organization->name = $request->input('name');        
        $organization->coach = json_encode($request->input('coach'));
        $organization->save();
        return redirect()->route('master-data.organization')->with('success', 'Berhasil menambahkan data');
    }

    public function organizationUpdate(Request $request, $id)
    {
    $validator = Validator::make($request->all(), [
        'name' => 'required',
    ]);
    if ($validator->fails()) {
        return redirect()->route('master-data.organization')->with('error', 'Gagal merubah data')->withInput()->withErrors($validator);
    }
        $organization = Organization::findOrFail($id);
        $organization->name = $request->input('name');        
        $organization->coach = json_encode($request->input('coach'));
        $organization->save();

        return redirect()->route('master-data.organization')->with('success', 'Berhasil Merubah data');
    }

    public function organizationDestroy($id)
    {
        $organization = Organization::findOrFail($id);
        $organization->delete();
        return redirect()->route('master-data.organization')->with('success', 'Berhasil Menghapus data');
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
            'type' => Result::where('category', 'intelligence')->get(),
            'organization' => Organization::all()
        ];
        return view('pages.master-data.intelligence-type',  $data);
    }

    public function intelligenceTypeUpdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required',
            'content' => 'required',
            'development_area' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('master-data.intelligence-type')->with('error', 'Gagal merubah data')->withInput()->withErrors($validator);
        }
        $type = Result::findOrFail($id);
        $type->type = $request->input('type');    
        $type->content = $request->input('content');        
        $type->development_area = $request->input('development_area');    
        $type->save();

        if(is_array($request->recomended)){
            Recomended::where('result_id', $id)->delete();
            foreach ($request->recomended as  $result) {
                Recomended::updateOrInsert([
                    'result_id' => $id,
                    'organization_id' => $result
                ]);
            }
        }else{
            Recomended::where('result_id', $id)->delete();
        }
        
        return redirect()->route('master-data.intelligence-type')->with('success', 'Berhasil Merubah data');
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

    public function personalityTypeUpdate(Request $request, $id)
    {
    $validator = Validator::make($request->all(), [
        'type' => 'required',
        'content' => 'required',
    ]);
    if ($validator->fails()) {
        return redirect()->route('master-data.personality-type')->with('error', 'Gagal merubah data')->withInput()->withErrors($validator);
    }
        $type = Result::findOrFail($id);
        $type->type = $request->input('type');    
        $type->content = $request->input('content');            
        $type->save();
        return redirect()->route('master-data.personality-type')->with('success', 'Berhasil Merubah data');
    }
}
