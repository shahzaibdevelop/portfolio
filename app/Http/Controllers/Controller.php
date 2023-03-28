<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use App\Service;
use App\Skill;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index(){
        $service = Service::get()->all();
        $skill = Skill::get()->all();
        return view('index',get_defined_vars());
    }


    public function login(){
        if(Auth::check())
        {
            return view('admin.index');
        }
        return view('admin.login');
    }
    public function adminPage(){
        if(Auth::check()){

            return view('admin.index');
        }
        return redirect()->back();
    }
    public function loginAdmin(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            return redirect('adminPage');
        }
        else{
            return back()->with('error','Invalid Login Details');
        }
        
    }
    public function logout(){
        Auth::logout();
        return redirect('admin');
    }
}
