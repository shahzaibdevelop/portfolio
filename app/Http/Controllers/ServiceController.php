<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use Illuminate\Support\Facades\Redirect;
class ServiceController extends Controller
{
    public function admin_services(){
        $sn=0;
        $service = Service::get()->all();
        return view('admin.services',get_defined_vars());
    }


    public function add_service(Request $request){
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'category'=>'required',
        ]);
        $service = new Service();
        $service->title=$request->title;
        $service->description=$request->description;
        $service->category=$request->category;
        $service->save();
        return redirect()->back()->with('msg', 'Service added !');

    }

    public function service_edit($id){
        $service = Service::where('id',$id)->get()->first();
       return view('admin.edit-service',get_defined_vars());
    }

    public function edit_service( Request $request,$id){
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'category'=>'required',
        ]);
        $service = Service::find($id);
        $service->title=$request->title;
        $service->description=$request->description;
        $service->category=$request->category;
        $service->save();
        return redirect('admin-services')->with('msg','Services Edited !');

    }

    public function service_delete($id){
        $service = Service::find($id);
        $service->delete();
        return redirect()->back()->with('msg','Service Deleted !');
    }
}
