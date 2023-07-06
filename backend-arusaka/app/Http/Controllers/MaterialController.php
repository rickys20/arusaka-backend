<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Material;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function getAll()
    {
        $materials = Material::all();
        return response()->json([
            'message' => 'Success',
            'data' => $materials
        ], 200);
    }

    public function getDetailMaterial(Request $request, $slug)
    {
        $material = Material::where('slug', $slug)->first();
        return response()->json([
            'message' => 'Success',
            'data' => $material
        ], 200);
    }

    public function store(Request $request)
    {
        // validate first
        $request->validate([
            'name' => 'required',
            'video' => 'required',
            'description' => 'required',
            'content' => 'required',
            'courses_id' => 'required',
        ]);

        $material = new Material();

        $material->name = $request->name;
        $material->slug = Str::slug($request->name);
        $material->video = $request->video;
        $material->description = $request->description;
        $material->content = $request->content;
        $material->courses_id = $request->courses_id;

        $material->save();
        return response()->json([
            'message' => 'Success',
            'data' => $material
        ], 200);
    }

    public function update(Request $request, $slug)
    {

        $request->validate([
            'name' => 'required',
            'video' => 'required',
            'description' => 'required',
            'content' => 'required',
            'courses_id' => 'required',
        ]);

        $material = Material::where('slug', $slug)->first();

        $material->name = $request->name;
        $material->slug = Str::slug($request->name);
        $material->video = $request->video;
        $material->description = $request->description;
        $material->content = $request->content;
        $material->courses_id = $request->courses_id;

        $material->save();
        return response()->json([
            'message' => 'Success',
            'data' => $material
        ], 200);
    }

    public function delete($slug)
    {
        $material = Material::where('slug', $slug)->first();
        $material->delete();
        return response()->json([
            'message' => 'Success',
            'data' => $material
        ], 200);
    }
}
