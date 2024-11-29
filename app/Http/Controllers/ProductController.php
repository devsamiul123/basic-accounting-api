<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * GET|HEAD        api/product ............... product.index › ProductController@index 
     * POST            api/product ............... product.store › ProductController@store 
     * GET|HEAD        api/product/{product} ............... product.show › ProductController@show 
     * PUT|PATCH       api/product/{product} ............... product.update › ProductController@update 
     * DELETE          api/product/{product} ............... product.destroy › ProductController@destroy 
     * 
     */
    public function index()
    {
        return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->toArray());
        return $product;
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return $product;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->product_name = $request->product_name ? $request->product_name : $product->product_name;
        $product->unit_price = $request->unit_price ? $request->unit_price : $product->unit_price;
        $product->unit_type = $request->unit_type ? $request->unit_type : $product->unit_type;
        $product->save();
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        return $product->delete();
    }
}
