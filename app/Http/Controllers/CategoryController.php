<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    
    public function index()
    {
        $category = Category::all();
        return response()->json($category);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            "name" => "required|string",
            "enable" => "required|boolean"
        ]);

        $data = $request->all();
        $category = Category::create($data);

        return response()->json($category);
    }

    public function show($id)
    {
        $category = Category::find($id);
        return response()->json($category);
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        
        if (!$category) {
            return response()->json(['message' => 'Data not found'], 404);
        }

        $this->validate($request, [
            "name" => "required",
            "enable" => "required"
        ]);

        $data = $request->all();
        $category->fill($data);
        $category->save();

        return response()->json($category);
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        
        if (!$category) {
            return response()->json(['message' => 'Data not found'], 404);
        }

        $category->delete();

        return response()->json(['message' => 'Data deleted successfully'], 200);
    }
}