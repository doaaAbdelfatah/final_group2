<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\ContactTypeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Contacts;
use App\Models\ContactType;
use App\Models\Products;
use App\Models\Supplier;
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view('/dashboard',"admin.dashboard")->middleware(["auth" ,"auth.admin"]);


Route::prefix("/brand")->middleware(["auth" ,"auth.admin"])->group(function(){
    Route::get("/" , [BrandController::class , "index"])->name("brands");
    Route::get("/delete/{id}" , [BrandController::class , "delete"])->where("id","[0-9]+")->name("brands_delete");
    Route::get("/edit/{id}" , [BrandController::class , "edit"])->where("id","[0-9]+")->name("brands_edit");
    Route::post("/" , [BrandController::class , "add"]);
    Route::post("/edit" , [BrandController::class , "update"]);

});

Route::resource("/types" , ContactTypeController::class)->except(["create"])->middleware(["auth" ,"auth.admin"]);

Route::get("/users/all" , [UserController::class ,"index"])->name("users.all")->middleware(["auth" ,"auth.admin"]);



Route::resource("/category"  ,CategoryController::class)->middleware(["auth" ,"auth.admin"]);
Route::resource("/product"  ,ProductController::class)->middleware(["auth" ,"auth.admin"]);
Route::resource("/supplier"  ,SupplierController::class)->middleware(["auth" ,"auth.admin"]);

Route::get("/contact/create/{type}/{id}" ,[ContactsController::class ,"create"])->middleware(["auth" ,"auth.admin"]);
Route::post("/contact/{type}/{id}" ,[ContactsController::class ,"store"]);
Route::post("/lang" ,function(Request $request){
    session()->put("locale" ,$request->locale);
     return redirect()->back();
 });

 Route::prefix("/product/images")->middleware(["auth" ,"auth.admin"])->group(function(){
    Route::get("/{product}/create" ,[ProductImageController::class ,"create"]);
    Route::post("/{product}" ,[ProductImageController::class ,"store"]);
});