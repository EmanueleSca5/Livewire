<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view("prod.index" , compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("prod.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => "required",
            "description" => "max:255|required",
            "price" => "integer|required",
            "img" => "image|mimes:png,jpg"
            ]);

            if($request->hasfile("img")){
               $validated["img"] = $request->img->store("img" , "public");
            }


        Product::create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view("prod.show" , compact("product"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view("prod.edit" , compact("product"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
                $validated = $request->validate([
            "name" => "required",
            "description" => "max:255|required",
            "price" => "integer|required",
            "img" => "image|mimes:png,jpg"
            ]);

            if($request->hasfile("img")){
               $validated["img"] = $request->img->store("img" , "public");
            }


        $product->update($validated);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
    }
}
