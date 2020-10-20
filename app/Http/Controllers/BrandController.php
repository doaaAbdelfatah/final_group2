<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Cat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use DB;
class BrandController extends Controller
{
    function add(Request $request){
        $request->validate([
            "name"=>"required|max:255"
        ]);
        $brand= new Brand();
        $brand->name =$request->name;
        $brand->save();
        // return redirect("/brand");
        return redirect()->route("brands");
    }

    function index(){
        $brands =Brand::all();
        return view("brand" )->with(compact("brands"));
    }
    function delete(Request $request){
      
       $brand= Brand::find(  $request->id);
       if(!empty($brand))   $brand->delete();
       return redirect()->route("brands");
    }
    function edit(Request $request){
      
       $brand= Brand::find(  $request->id);
      
      return view ("brand_edit")->with(compact("brand"));
    //    if(!empty($brand))   $brand->delete();
    //    return redirect()->route("brands");
    }

    function update(Request $request){
        $request->validate([
            "id" => "required|exists:brands,id",
            "name"=>"required|max:255"
        ]);
        $brand= Brand::find($request->id);
        $brand->name =$request->name;
        $brand->save();        
        return redirect()->route("brands");
    }
    // function add(Request $request){
    //     // validate
    //     $request->validate([
    //         "name" =>"required|min:3|max:50",
    //         "info" =>"nullable|min:5"
    //     ]);
    //     // $rslt= DB::insert("insert into brands(name) values('xxx')");
    //     // $rslt =DB::table("brands")->insert(["name"=>"Test"]);
    //     // $rslt =DB::table("brands")->where("id" ,2)->update(["name"=>"aaaa"]);
    //     // $rslt =DB::table("brands")->where("id" ,2)->delete();
    //     // $rslt =DB::table("brands")->get();

    //     // $rslt =Cat::all();
    //     // dd($rslt->all());
    //     // dd($request->info);
    //     // dd($request->input("name"));
    //     $b = new Brand();
    //     $b->name = $request->name;
    //     $b->save();
    // }
}
