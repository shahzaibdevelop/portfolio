<?php

namespace App\Http\Controllers;

use App\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
   public function admin_skills(){
    $sn=0;
    $skill = Skill::get()->all();
    return view('admin.skills',get_defined_vars());
   }

   public function add_skill(Request $request){
    $request->validate([
        'skill'=>'required',
        'description'=>'required',
        'percentage'=>'required',

    ]);
    $skill = new Skill();
    $skill->skill=$request->skill;
    $skill->description=$request->description;
    $skill->percentage=$request->percentage;
    $skill->save();
    return redirect()->back()->with('msg','Skill Added !');
   }

   public function skill_edit($id){
    $skill = Skill::find($id);
    return view('admin.edit-skill',get_defined_vars());
   }

   public function edit_skill(Request $request,$id){
    $request->validate([
        'skill'=>'required',
        'description'=>'required',
        'percentage'=>'required|numeric',
    ]);
    $skill = Skill::find($id);
    $skill->skill= $request->skill;
    $skill->description=$request->description;
    $skill->percentage=$request->percentage;
    $skill->save();
    return redirect('admin-skills')->with('msg','Skill Edited !');
   }

   public function skill_delete($id){
        $skill=Skill::find($id);
        $skill->delete();
        return redirect()->back()->with('msg','Skill Deleted !');
   }
}
