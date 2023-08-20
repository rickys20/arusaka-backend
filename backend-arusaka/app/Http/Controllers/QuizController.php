<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $checkauth = auth()->user();
        if (!$checkauth) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        $query = Quiz::query();

        // Execute the query and paginate the results
        $perPage = $request->query('per_page', 10); // Default to 10 items per page
        $filteredCourses = $query->paginate($perPage);

        return response()->json([
            'message' => 'Success',
            'data' => $filteredCourses
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $course)
    {
        $validator = Validator::make($request->all(), [
            'quiz_name' => 'required|unique:quizzes',
            'minimum_material' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $dataCourse = Course::where('slug', $course)->first();
        if($dataCourse){
            $quiz = new Quiz();
            $quiz->quiz_name = $request->quiz_name;
            $quiz->slug = Str::slug($request->quiz_name);
            $quiz->minimum_material = $request->minimum_material;
            $quiz->courses_id = $dataCourse->id;
            $quiz->save();
            return response()->json([
                'message' => 'Quiz created successfully',
                'data' => $quiz
            ], 200);
        }else{
            return response()->json([
                'data' => 'Data course not found'
            ], 400);
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(Quiz $quiz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $course, $quiz)
    {
        $validator = Validator::make($request->all(), [
            'quiz_name' => 'required',
            'minimum_material' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $dataQuiz = Quiz::where('slug', $quiz)->first();
        if($dataQuiz){
            if ($dataQuiz->quiz_name != $request->quiz_name) {
                $slug = strtolower(str_replace(' ', '-', $request->quiz_name));
                $dataQuiz->update([
                    'quiz_name' => $request->quiz_name,
                    'slug' => $slug
                ]);
            };
            $dataQuiz->update($request->except('quiz_name'));
            $dataQuiz->save();
            return response()->json([
                'message' => 'Quiz updated successfully',
                'data' => $dataQuiz
            ], 200);
        }else{
            return response()->json([
                'data' => 'Data quiz not found'
            ], 400);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quiz $quiz)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $course, $quiz)
    {
        $quiz = Quiz::where('slug', $quiz)->first();
        $quiz->delete();

        return response()->json([
            'message' => 'Quiz deleted successfully',
        ], 200);
    }
}
