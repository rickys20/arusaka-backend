<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Quiz;
use App\Models\QuizItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuizItemController extends Controller
{
    public function index(Request $request)
    {
        $checkauth = auth()->user();
        if (!$checkauth) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        $query = QuizItem::query();

        // Execute the query and paginate the results
        $perPage = $request->query('per_page', 10); // Default to 10 items per page
        $filteredCourses = $query->paginate($perPage);

        return response()->json([
            'message' => 'Success',
            'data' => $filteredCourses
        ], 200);
    }

    public function store(Request $request, $course, $quiz)
    {
        $checkauth = auth()->user();
        if (!$checkauth) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        $validator = Validator::make($request->all(), [
            'content' => 'required',
            'a' => 'required',
            'b' => 'required',
            'c' => 'required',
            'd' => 'required',
            'solution' => 'required',
            'explanation' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $dataCourse = Course::where('slug', $course)->first();
        $dataQuiz = Quiz::where('slug', $quiz)->first();
        if ($dataCourse && $dataQuiz) {
            $item = new QuizItem();
            $item->content = $request->content;
            $item->a = $request->a;
            $item->b = $request->b;
            $item->c = $request->c;
            $item->d = $request->d;
            $item->solution = $request->solution;
            $item->explanation = $request->explanation;
            $item->quiz_id = $dataQuiz->id;
            $item->save();
            return response()->json([
                'message' => 'Quiz Item created successfully',
                'data' => $item
            ], 200);
        } else {
            return response()->json([
                'data' => 'Data course or Quiz not found'
            ], 400);
        }
    }

    public function show(Request $request, $course, $quiz)
    {
        $dataQuiz = Quiz::where('slug',$quiz)->first();
        if($dataQuiz){
            $dataSoal = QuizItem::where('quiz_id',$dataQuiz->id)->get();
            $dataNoSoal = QuizItem::where('quiz_id', $dataQuiz->id)->pluck('id')->toArray();

            return response()->json([
                'message' => 'Quiz Item created successfully',
                'no_soal' => $dataNoSoal,
                'data' => $dataSoal
            ], 200);
        }else{
            return response()->json([
                'data' => 'Data Quiz not found'
            ], 400);
        }
    }

    public function edit(Request $request, $course, $quiz, $no_item)
    {
        $checkauth = auth()->user();
        if (!$checkauth) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        $validator = Validator::make($request->all(), [
            'content' => 'required',
            'a' => 'required',
            'b' => 'required',
            'c' => 'required',
            'd' => 'required',
            'solution' => 'required',
            'explanation' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $dataQuizItem = QuizItem::where('id', $no_item)->first();
        if ($dataQuizItem) {
            $dataQuizItem->update($request->all());
            $dataQuizItem->save();
            return response()->json([
                'message' => 'Quiz Item updated successfully',
                'data' => $dataQuizItem
            ], 200);
        } else {
            return response()->json([
                'data' => 'Data item not found'
            ], 400);
        }
    }

    public function destroy(Request $request, $course, $quiz, $no_item)
    {
        $quizItem = QuizItem::where('id', $no_item)->first();
        if($quizItem){
            $quizItem->delete();

            return response()->json([
                'message' => 'Quiz deleted successfully',
            ], 200);
        }else{
            return response()->json([
                'data' => 'Data Quiz Item not found'
            ], 400);
        }
    }
}
