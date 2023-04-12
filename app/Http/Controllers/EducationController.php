<?php

namespace App\Http\Controllers;

use App\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function admin_education(){
        $sn=0;
        $education = Education::orderby('id','DESC')->get();
        return view('admin.education',get_defined_vars());
    }
    public function add_education(Request $request){
        $request->validate([
            'institute_name'=>'required',
            'degree_name'=>'required',
            'description'=>'required',
            'start_year'=>'required',
            'end_year'=>'required',
        ]);
        $education = new Education();
        $education->institute_name = $request->institute_name;
        $education->degree_name = $request->degree_name;
        $education->description = $request->description;
        $education->start_year = $request->start_year;
        $education->end_year = $request->end_year;
        $education->save();
        return back()->with('msg','Education added !');

    }
    public function editEducationPage($id){
        $education = Education::find($id);
        return view('admin.edit-education',get_defined_vars());
    }
    public function editEducation(Request $request, $id){
        $request->validate([
            'institute_name'=>'required',
            'degree_name'=>'required',
            'description'=>'required',
            'start_year'=>'required',
            'end_year'=>'required',
        ]);
        $education =  Education::find($id);
        $education->institute_name = $request->institute_name;
        $education->degree_name = $request->degree_name;
        $education->description = $request->description;
        $education->start_year = $request->start_year;
        $education->end_year = $request->end_year;
        $education->save();

        return redirect()->route('education');
    }
    public function deleteEducation($id){
        $education  = Education::find($id);
        $education->delete();
        return back()->with('msg','Education deleted');
    }
}
