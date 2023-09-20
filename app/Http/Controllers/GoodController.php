<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Good;
use Illuminate\Support\Str;

class GoodController extends Controller
{

    public function getAll()
    {
        $goods = Good::all();
        return response()->json([
            'message' => 'Success',
            'data' => $goods
        ], 200);
    }

    public function getOneBasedId($id)
    {
        $good = Good::find($id);
        if (!$good) {
            return response()->json([
                'message' => 'Good not found',
            ], 404);
        }
        return response()->json([
            'message' => 'Success',
            'data' => $good
        ], 200);
    }

    public function getOneBasedSlug($slug)
    {
        $good = Good::where('slug', $slug)->first();
        if (!$good) {
            return response()->json([
                'message' => 'Good not found',
            ], 404);
        }
        return response()->json([
            'message' => 'Success',
            'data' => $good
        ], 200);
    }

    // store and generate slug
    public function store(Request $request)
    {
        $good = new Good();
        $good->fill($request->all());
        $good->slug = Str::slug($request->name);
        $good->save();
        return response()->json([
            'message' => 'Good created',
            'data' => $good
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $good = Good::find($id);
        if (!$good) {
            return response()->json([
                'message' => 'Good not found',
            ], 404);
        }
        $good->fill($request->all());
        $good->save();
        return response()->json([
            'message' => 'Good updated',
            'data' => $good
        ], 200);
    }

    public function delete($id)
    {
        $good = Good::find($id);
        if (!$good) {
            return response()->json([
                'message' => 'Good not found',
            ], 404);
        }
        $good->delete();
        return response()->json([
            'message' => 'Good deleted',
        ], 200);
    }
}
