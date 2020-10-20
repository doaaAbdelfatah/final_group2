<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::all();
        return view('products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("products.create");
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
            "name" => "required|max:255",
            "qty" => "required|integer",
            "price" => "required|numeric",
            "category_id" => "required|exists:categories,id",
            "brand_id" => "nullable|exists:brands,id"
        ]);

        $p = Products::create($request->all());
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Products::findOrFail($id);
        $category = Category::find($product->category_id);
        $brand = Brand::find($product->brand_id);
        return view('products.show', ['product' => $product, 'brand' => $brand, 'cat' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Products::findOrFail($id);
        $brands = Brand::all();
        $categories = Category::all();
        return view('products.edit', ['product' => $product, 'brands' => $brands, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            "id" => 'numeric|exists:products,id',
            "name" => "required|max:255",
            "qty" => "required|integer",
            "price" => "required|numeric",
            "category_id" => "required|exists:categories,id",
            "brand_id" => "nullable|exists:brands,id"
        ]);
        Products::find($request->id)->update($request->all());
        return redirect(route('product.index'))->with('updated', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Products::findOrFail($id)->delete();
        return redirect(route('product.index'))->with('deleted', 'Deleted successfully');
    }
}
