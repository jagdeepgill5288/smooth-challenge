<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function showAllProducts()
    {
        return response()->json(Products::all());
    }

    public function showOneProduct($id)
    {
        return response()->json(Products::find($id));
    }

    public function create(Request $request)
    {
        $product = Products::create($request->all());

        return response()->json($product, 201);
    }

    public function update($id, Request $request)
    {
        $product = Products::findOrFail($id);
        $product->update($request->all());

        return response()->json($product, 200);
    }

    public function delete($id)
    {
        Products::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}