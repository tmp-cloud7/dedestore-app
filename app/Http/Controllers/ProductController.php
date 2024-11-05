<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;
use Validator;

class ProductController extends Controller
{
    //
    function addProduct(Request $request) {

        $validator = Validator::make($request->all(),[
            "product_name" => "required|string|max:255",
            "product_desc" => "nullable|text",
            "initial_price" => "required|numeric|min:0",
            "selling_price" => "required|numeric|min:0",
            "quantity" => "required|numeric|min:0",
            "category" => "required",
            "product_image" => "required",
            "vendor_id" => "required|numeric",
           
        ], [
            "product_name.required" => "Product name is required",
            "Initial_price.required" => "Initial price is required",
            "selling_price.required" => "Selling price is required",
            "quantity.required" => "Quantity is required",
            "category.required" =>"Product category is required",
            
            
        ]);
        if($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }
        try {
        $product = new Product;
            $product->product_name = $request->input('product_name');
            $product->product_desc = $request->input('product_desc');
            $product->initial_price = $request->input('initial_price');
            $product->selling_price = $request->input('selling_price');
            $product->quantity = $request->input('quantity');
            $product->category = $request->input('category');
            $product->product_image = $request->file('product_image')->store('product_dp');
            $product->vendor_id = $request->input('vendor_id');
            $product->save();
            return response()->json($product, 201);
        } catch(\Exception $e) {
            return response()->json(['errors' => $e->getMessage()], 500);
        }
    }

}