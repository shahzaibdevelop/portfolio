<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contactMessages(){
        $sn = 0;
        $contact = Contact::paginate(2);
        return view('admin.contact',get_defined_vars());
    }
    public function contactPOST(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'subject'=>'required',
            'message'=>'required',
        ]);
        $contact = new Contact();
      $contact->name=  $request->name;
      $contact->email=  $request->email;
      $contact->subject=  $request->subject;
      $contact->message=  $request->message;
      $contact->save();
      return back()->with('msg','Message Sent !');

    }
}
