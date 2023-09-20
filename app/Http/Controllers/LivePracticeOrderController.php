<?php

namespace App\Http\Controllers;

use App\Models\LivePracticeOrder;
use App\Models\LivePractice;
use App\Models\Course;
use Illuminate\Http\Request;

class LivePracticeOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $course)
    {
        $checkauth = auth()->user();
        if (!$checkauth) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        $dataCourse = Course::where('slug', $course)->first();
        if ($dataCourse) {
            $dataLivePractice = LivePractice::where('courses_id', $dataCourse->id)->get();
            if ($dataLivePractice) {
                $livePracticeData = [];

                foreach ($dataLivePractice as $livePractice) {
                    $livePracticeOrderCount = LivePracticeOrder::where('live_practice_id', $livePractice->id)
                        ->where('user_id', $checkauth->id)->first();
                    if ($livePracticeOrderCount) {
                        // Tambahkan informasi tentang LivePracticeOrder ke dalam array
                        $livePracticeData[] = [
                            'livePractice' => $livePractice
                        ];
                    }
                }

                return response()->json([
                    'data' => $livePracticeData,
                ], 200);
            } else {
                return response()->json([
                    'data' => 'Data Live Practice not found'
                ], 400);
            }
        } else {
            return response()->json([
                'data' => 'Data Course not found'
            ], 400);
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
    public function show(LivePracticeOrder $livePracticeOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LivePracticeOrder $livePracticeOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LivePracticeOrder $livePracticeOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LivePracticeOrder $livePracticeOrder)
    {
        //
    }
}
