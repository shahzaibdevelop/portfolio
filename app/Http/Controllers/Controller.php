<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Education;
use App\Experience;
use App\HomePage;
use App\Portfolio;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use App\Service;
use App\Skill;
use App\Testimonial;
use App\User;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index(){
        $service = Service::get()->all();
        $skill = Skill::get()->all();
       $user = User::first();
        // $portfolio = DB::table('portfolios')
        // ->join('images', 'images.image_id', '=', 'portfolios.id')
        // ->select(DB::raw('portfolios.id, GROUP_CONCAT(DISTINCT images.path SEPARATOR ";") as paths'), 'portfolios.*')
        // ->where('images.type', 'portfolio')
        // ->groupBy('portfolios.id')
        // ->get();
        $portfolio = DB::table('portfolios')
        ->join('images', 'images.image_id', '=', 'portfolios.id')
        ->select(DB::raw('portfolios.id, SUBSTRING_INDEX(GROUP_CONCAT(DISTINCT images.path ORDER BY images.id SEPARATOR ";"), ";", 1) as path'), 'portfolios.*')
        ->where('images.type', 'portfolio')
        ->groupBy('portfolios.id')
        ->get();

        $education = Education::orderby('id','DESC')->get();

        $experience = Experience::orderby('id','DESC')->get();

        $testimonial = Testimonial::orderby('id','DESC')->get();
        $detail = HomePage::first();
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
        $contact = Contact::count();
        $skills = Skill::count();
        $portfolio = Portfolio::count();
        $experiences = HomePage::first();
        $experience=$experiences->experience;
        
        if(Auth::check()){

            return view('admin.index',get_defined_vars());
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
