<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

use App\Image;
use App\Portfolio;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
   public function admin_portfolio(){
    $sn =0;
    $image = new Image();
    $portfolio = Portfolio::get()->all();
    return view('admin.portfolio',get_defined_vars());
   }
   
   public function add_portfolio(Request $request){

    $request->validate([
        'title'=>'required',
        'description'=>'required',
        'tags'=>'required',
        'images'=>'required',
        'technology'=>'required',
        'year'=>'required',
    ]);

   
    $portfolio = new Portfolio();
    $portfolio->title = $request->input('title');
    $portfolio->description = $request->input('description');
    $portfolio->tags = $request->tags;
    $portfolio->technology = $request->technology;
    $portfolio->year = $request->year;
    $portfolio->save();

    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            if ($image->isValid()) {
                $imagetable = new Image();
                $imgName = time() . rand(1000, 9999999) . "-" . str_replace(" ", "_", $image->getClientOriginalName());
                $image->move(public_path('upload_images'), $imgName);
                $imagetable->path = $imgName;
                $imagetable->image_id = $portfolio->id;
                $imagetable->type = 'portfolio';
                $imagetable->save();
            }
        }
    }
    
    return redirect()->back()->with('msg','Portfolio added !');

   }

   public function edit_portfolio($id){
    $portfolio = Portfolio::find($id);
    return view('admin.edit-portfolio',get_defined_vars());
   }

   public function portfolio_edit(Request $request,$id){
        $portfolio = Portfolio::find($id);
        $portfolio->title = $request->input('title');
        $portfolio->description = $request->input('description');
        $portfolio->tags = $request->tags;
        $portfolio->technology = $request->technology;
        $portfolio->year = $request->year;
        $portfolio->save();
        return redirect('admin-portfolio')->with('msg','Portfolio updated !');
   }

   public function work_single($id){
    // $portfolio = DB::table('portfolios')
    // ->join('images', 'images.image_id', '=', 'portfolios.id')
    // ->select(DB::raw('portfolios.id, SUBSTRING_INDEX(GROUP_CONCAT(DISTINCT images.path ORDER BY images.id SEPARATOR ";"), ";", 1) as path'), 'portfolios.*')
    // ->where('images.type', 'portfolio')
    // ->where('portfolios.id',$id)
    // ->groupBy('portfolios.id')
    // ->get();
    $portfolio = DB::table('portfolios')
    ->join('images', 'images.image_id', '=', 'portfolios.id')
    ->select('portfolios.id', DB::raw('GROUP_CONCAT(DISTINCT images.path ORDER BY images.id SEPARATOR ";") as paths'), 'portfolios.*')
    ->where('images.type', 'portfolio')
    ->where('portfolios.id', $id)
    ->groupBy('portfolios.id')
    ->first();

// Split the paths by the delimiter
$paths = explode(';', $portfolio->paths);

    return view('work-single',get_defined_vars());
   }
}
