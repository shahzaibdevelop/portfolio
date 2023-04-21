<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use App\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            $new_img = time().rand(00000,99999).str_replace(' ', '_', $img->getClientOriginalName());
            $img->move(public_path("testimonial_images"), $new_img);
            $testimonial->image  = $new_img;
        }
        $testimonial->save();

        return back()->with('msg','Testimonial added !');
    }

    public function editTestimonialPage($id){
        $testimonial = Testimonial::find($id);
        return view('admin.edit-testimonial',get_defined_vars());
    }

    public function editTestimonial(Request $request , $id){
        $request->validate([
            'name'=>'required',
            'company_name'=>'required',
            'description'=>'required',
            'image'=>'mimes:png,jpg,jpeg',
        ]);

        $testimonial =  Testimonial::find($id);
        $testimonial->name=$request->name;
        $testimonial->company_name=$request->company_name;
        $testimonial->description=$request->description;
        if($request->hasFile('image')){
            //Delete Old Image
            $file = public_path('testimonial_images/'.$testimonial->image);
          $del=  File::delete($file);
          //Adding new one 
            $img = $request->file('image');
            $new_img = rand(000000,99999).str_replace(' ', '_', $img->getClientOriginalName());
            $img->move(public_path("testimonial_images"), $new_img);
            $testimonial->image  = $new_img;
        }
        $testimonial->save();

        return redirect()->route('testimonial')->with('msg','Testimonial edited !');
    }

    public function deleteTestimonial($id){
        $testimonial = Testimonial::find($id);
        $delimage = public_path('testimonial_images/'.$testimonial->image);
        File::delete($delimage);
        $testimonial->delete();
        return redirect()->route('testimonial')->with('msg','Testimonial deleted !');
    }
}
