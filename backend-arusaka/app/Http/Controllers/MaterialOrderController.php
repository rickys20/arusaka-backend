<?php

namespace App\Http\Controllers;

use App\Models\MaterialOrder;
use App\Models\Material;
use App\Models\CourseOrder;
use App\Models\Course;
use Illuminate\Http\Request;

class MaterialOrderController extends Controller
{
    public function detail(Request $request, $course, $material)
    {
        $checkauth = auth()->user();
        if (!$checkauth) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        $data_slug = Material::where('slug', $material)->first();
        if ($data_slug) {
            $check_locked = MaterialOrder::where('material_id', $data_slug->id)->where('user_id', $checkauth->id)->first();
            if ($check_locked->status == 'locked') {
                return response()->json([
                    'message' => "Material Locked",
                ], 401);
            } else {
                $nextMaterialId = $data_slug->id + 1;
                $unlockedMaterial = MaterialOrder::where('material_id', $nextMaterialId)
                    ->where('user_id', $checkauth->id)
                    ->first();
                if ($unlockedMaterial) {
                    // Update the status to 'unlocked'
                    $unlockedMaterial->update(['status' => 'unlocked']);
                } else {
                    return response()->json([
                        'message' => 'Material not found or is not eligible for unlocking.',
                    ], 404);
                }
                return response()->json([
                    'message' => 'Success',
                    'data' => $data_slug,
                ], 200);
            }
        } else {
            return response()->json([
                'message' => 'Material Not Found',
            ], 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MaterialOrder $materialOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MaterialOrder $materialOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MaterialOrder $materialOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MaterialOrder $materialOrder)
    {
        //
    }
}
