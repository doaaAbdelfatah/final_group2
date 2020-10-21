<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    function __construct()
    {
        //$this->middleware("");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Category::orderBy("id" ,"desc")->get();
        return view("categories.index")->with(compact("cats"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ("categories.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     function catValidation(Request $request){
        $request->validate([
            "name" =>"required",
            "category_id" =>"nullable|exists:categories,id"
        ]);

     }
    public function store(Request $request)
    {
        $this->catValidation($request);
       
        // Category::create($request->all());
        $c = Category::create($request->except("_token"));
       return redirect()->route("category.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view("categories.show")->with(compact("category"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
       return view ("categories.edit")->with(compact("category"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->catValidation($request);
       
       $category->name =$request->name;
       $category->category_id =$request->category_id;
       $category->save();
       return redirect()->route("category.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if ($category->sub_categories->count() ==0)
            $category->delete();
        else{
                session()->flash("error" ,"Can't Delete Category " .$category->name . " Because has sub categories");
            }
        return redirect()->route("category.index");
    }

    function get_products (Category $category){
       
        return view ("cat_products")->with(compact("category"));
    }
}
