<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    
    public function index()
    {
        $image = Image::all();
        return response()->json($image);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            "name" => "required|string",
            "file" => "required|string",
            "enable" => "required|boolean",
            "product_id" => "required|integer"
        ]);

        $data = $request->all();
        $image = Image::create($data);
        $pvt = Image::find($image->id);
        $pvt->products()->attach($data['product_id']);

        return response()->json($image);
    }

    public function show($id)
    {
        $image = Image::find($id);
        return response()->json($image);
    }

    public function update(Request $request, $id)
    {
        $image = Image::find($id);
        
        if (!$image) {
            return response()->json(['message' => 'Data not found'], 404);
        }

        $this->validate($request, [
            "name" => "required|string",
            "file" => "required|string",
            "enable" => "required|boolean",
            "product_id" => "required|integer"
        ]);

        $data = $request->all();
        $image->fill($data);
        $image->save();
        $image->products()->sync($data['product_id']);

        return response()->json($image);
    }

    public function destroy($id)
    {
        $image = Image::find($id);
        
        if (!$image) {
            return response()->json(['message' => 'Data not found'], 404);
        }

        $image->products()->wherePivot('image_id','=',$id)->detach();
        $image->delete();

        return response()->json(['message' => 'Data deleted successfully'], 200);
    }
}