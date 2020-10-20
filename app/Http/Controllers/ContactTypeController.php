<?php

namespace App\Http\Controllers;

use App\Models\ContactType;
use Illuminate\Http\Request;

class ContactTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // $types = ContactType::all();
        $types = ContactType::with(["contacts"=> function ($query) {
            $query->orderBy('created_at', 'desc');
        }])->get();
        return view("types.index")->with(compact("types"));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(["type" => "required"]);
        // $type =ContactType::create([
        //     "type" =>$request->type
        // ]);
        // $type =ContactType::create($request->all());
        $type =ContactType::create($request->except("_token"));
        // return redirect()->action([ContactTypeController::class ,"index"]);
        return redirect()->route("types.index");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContactType  $contactType
     * @return \Illuminate\Http\Response
     */
    public function show(ContactType $contactType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContactType  $contactType
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactType $type)
    {
        // dd($type);
        return view("types.edit")->with(compact("type"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContactType  $contactType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactType $type)
    {
      //  dd($type);
        $request->validate(["type" => "required"]);
        $type->type = $request->type;
        $type->save();
        return redirect()->route("types.index");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContactType  $contactType
     * @return \Illuminate\Http\Response
     */
    public function destroy( ContactType $type)
    { 
        // dd($type);
        $type->delete();
        // ContactType::destroy($id);
        return redirect()->route("types.index");
    }
}
