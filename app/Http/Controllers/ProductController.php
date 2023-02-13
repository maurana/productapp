<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{  
    public function index()
    {
        $product = Product::all();
        return response()->json($product);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            "name" => "required|string",
            "description" => "required|string",
            "enable" => "required|boolean",
            "category_id" => "required|integer"
        ]);

        $data = $request->all();
        $product = Product::create($data);
        $pvt = Product::find($product->id);
        $pvt->categorys()->attach($data['category_id']);

        return response()->json($product);
    }

    public function show($id)
    {
        $product = Product::find($id);
        return response()->json($product);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        
        if (!$product) {
            return response()->json(['message' => 'Data not found'], 404);
        }

        $this->validate($request, [
            "name" => "required|string",
            "description" => "required|string",
            "enable" => "required|boolean",
            "category_id" => "required|integer"
        ]);

        $data = $request->all();
        $product->fill($data);
        $product->save();
        $product->categorys()->sync($data['category_id']);

        return response()->json($product);
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        
        if (!$product) {
            return response()->json(['message' => 'Data not found'], 404);
        }

        $product->categorys()->wherePivot('product_id','=',$id)->detach();
        $product->delete();
        
        return response()->json(['message' => 'Data deleted successfully'], 200);
    }
}