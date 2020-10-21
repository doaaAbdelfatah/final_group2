<?php

namespace App\Http\Controllers;

use App\Mail\AddNewUser;
use App\Models\User;
use App\Models\Contacts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        switch(Auth::user()->role){
            case "super admin":
                $users = User::all();
            break;
            case "admin":
                $users = User::whereIn("role" , ["user" ,"seller"])->get();
            break;
        }     
        
        return view("users.index")->with("users" ,$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("users.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $request->validate([
            "name"=>"required",
            "email"=>"required"
        ]);
        if (Auth::user()->role =="super admin"){
            $role = $request->role;
        }else if(Auth::user()->role =="admin")
        {
            $role = "seller";
        }else{
            return \redirect()->back();
        }

        $text ="abcdefghijklmnopqrstuvxyz01234567893428#*$()";
        $text = str_shuffle($text);
        $pw = substr($text,1 ,10);
        $u = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "role" => $role,
            "password" => bcrypt($pw)

        ]);
        Mail::to($request->email)->send(new AddNewUser($u ,$pw));
        return \redirect()->route("users.all");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
