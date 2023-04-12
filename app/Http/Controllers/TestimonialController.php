<?php

namespace App\Http\Controllers;

use App\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function admin_testimonial(){
        $sn = 0;
        $testimonial = Testimonial::orderby('id','DESC')->get();
        return view('admin.testimonial',get_defined_vars());
    }

    public function add_testimonial(Request $request){
        $request->validate([
            'name'=>'required',
            'company_name'=>'required',
            'description'=>'required',
            'image'=>'required|mimes:png,jpg,jpeg',

        ]);

        $testimonial = new Testimonial();
        $testimonial->name=$request->name;
        $testimonial->company_name=$request->company_name;
        $testimonial->description=$request->description;
        if($request->hasFile('image')){
            $img = $request->file('image');
            $new_img = str_replace(' ', '_', $img->getClientOriginalName());
            $img->move(public_path("testimonial_images"), $new_img);
            $testimonial->image  = $new_img;
        }
        $testimonial->save();

        return back()->with('msg','Testimonial added !');
    }
}
