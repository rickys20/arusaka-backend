<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\LivePractice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class LivePracticeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = LivePractice::all();

        return response()->json([
            'message' => 'Success',
            'data' => $query
        ], 200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $course)
    {
        $checkauth = auth()->user();
        if (!$checkauth) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:live_practices',
            'partiture' => 'required',
            'time' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $new = new LivePractice();
        $new->title = $request->title;
        $new->slug = Str::slug($request->title);
        $new->partiture = $request->partiture;
        $new->time = $request->time;
        $dataCourse = Course::where('slug', $course)->first();
        if(!$dataCourse){
            return response()->json([
                'data' => 'Data course not found'
            ], 400);
        }
        $new->courses_id = $dataCourse->id;
        $new->save();
        return response()->json([
            'message' => 'Live Practice created successfully',
            'data' => $new
        ], 200);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $course, $live)
    {
        $checkauth = auth()->user();
        if (!$checkauth) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:live_practices',
            'partiture' => 'required',
            'time' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $dataLivePractice = LivePractice::where('slug', $live)->first();
        if($dataLivePractice){
            if ($dataLivePractice->title != $request->title) {
                $slug = strtolower(str_replace(' ', '-', $request->title));
                $dataLivePractice->update([
                    'title' => $request->title,
                    'slug' => $slug
                ]);
            };
            $dataLivePractice->update($request->except('title'));
            $dataLivePractice->save();
            return response()->json([
                'message' => 'Quiz updated successfully',
                'data' => $dataLivePractice
            ], 200);
        }else{
            return response()->json([
                'data' => 'Data Live practice not found'
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $course, $live)
    {
        $data = LivePractice::where('slug', $live)->first();
        $data->delete();

        return response()->json([
            'message' => 'Live Practice deleted successfully',
        ], 200);
    }
}
