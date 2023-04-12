<?php

namespace App\Http\Controllers;

use App\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
  public function admin_experience(){
    $sn = 0;
    $experience = Experience::orderby('id','DESC')->get();
    return view('admin.experience',get_defined_vars());
  }

  public function add_experience(Request $request){
    $request->validate([
        'title'=>'required',
        'company_name'=>'required',
        'description'=>'required',
        'start_year'=>'required',
        'end_year'=>'required',
    ]);
    $education = new Experience();
    $education->title = $request->title;
    $education->company_name = $request->company_name;
    $education->description = $request->description;
    $education->start_year = $request->start_year;
    $education->end_year = $request->end_year;
    $education->save();
    return back()->with('msg','Education added !');

  }

  public function editExperiencePage($id){
    $experience = Experience::find($id);
    return view('admin.edit-experience',get_defined_vars());
  }
  public function editExperience(Request $request,$id){
    $request->validate([
        'title'=>'required',
        'company_name'=>'required',
        'description'=>'required',
        'start_year'=>'required',
        'end_year'=>'required',
    ]);
    $education =  Experience::find($id);
    $education->title = $request->title;
    $education->company_name = $request->company_name;
    $education->description = $request->description;
    $education->start_year = $request->start_year;
    $education->end_year = $request->end_year;
    $education->save();
    return redirect()->route('experience')->with('msg','Experience updated');

  }
  public function deleteExperience($id){
    $education  = Experience::find($id);
    $education->delete();
    return back()->with('msg','Experience deleted');
}

}
