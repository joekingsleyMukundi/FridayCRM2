<?php

namespace App\Http\Services;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;

class ProductService
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getProducts = Product::paginate(15);

        return ProductResource::collection($getProducts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($request)
    {
        $product = new Product;
        $product->name = $request->input("name");

        $saved = $product->save();

        $message = $product->name . " created successfully";

        return [$saved, $message, $product];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        return new ProductResource($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($request, $id)
    {
        $product = Product::find($id);

        if ($request->filled("name")) {
            $product->name = $request->input("name");
        }

        if ($request->filled("registration_number")) {
            $product->registration_number = $request->input("registration_number");
        }

        if ($request->filled("address")) {
            $product->address = $request->input("address");
        }

        if ($request->filled("phone")) {
            $product->phone = $request->input("phone");
        }

        $saved = $product->save();

        $message = $product->name . " updated successfully";

        return [$saved, $message, $product];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $getProduct = Product::find($id);

        $deleted = $getProduct->delete();

        $message = $getProduct->name . " deleted successfully";

        return [$deleted, $message, $getProduct];
    }
}
