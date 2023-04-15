<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HomePage;
use App\User;
use Illuminate\Support\Facades\Hash;
class HomePageController extends Controller
{
    public function myDetails(){
        $detail= HomePage::find(1);
        $user = User::find(1);
        return view('admin.details',get_defined_vars());
    }
    public function detailsPost(Request $request){
        $request->validate([
            'fname'=>'string',
            'lname'=>'string',
            'occupation'=>'string',
            'description'=>'string',
            'projects'=>'integer',
            'resume'=>'string',
        ]);
        
        $detail = HomePage::find(1);
        $detail->fname = $request->fname;
        $detail->lname = $request->lname;
        $detail->occupation = $request->occupation;
        $detail->description = $request->description;
        $detail->projects = $request->projects;
        $detail->experience = $request->experience;
        $detail->resume = $request->resume;
        $detail->facebook = $request->facebook;
        $detail->instagram = $request->instagram;
        $detail->twitter = $request->twitter;
        $detail->linkedin = $request->linkedin;
        $detail->github = $request->github;
        $detail->youtube = $request->youtube;
        $detail->save();
        return back()->with('msg','Details updated !');
    }
    public function adminDetailsPost(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'address'=>'required',
            'phone'=>'required',

        ]);
        $user = User::find(1);
        $user->name=$request->name;
        $user->email=$request->email;
        if($request->password){
            $user->password=Hash::make($request->password);

        }
        $user->address=$request->address;
        $user->phone=$request->phone;
        $user->save();
        return back()->with('message','Admin Details Edited !');

    }
}
