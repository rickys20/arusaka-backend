<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function store(Request $request, $course_slug)
    {
        $user_id = auth()->user()->id;

        $course_id = Course::where('slug', $course_slug)->first()->id;

        $check = User::find($user_id)->courses()->where('courses_id', $course_id)->first();

        if ($check) {
            $user = User::find($user_id);
            $user->courses()->updateExistingPivot($course_id, [
                'rating' => $request->rating,
                'comment' => $request->comment
            ]);

            return response()->json([
                'message' => 'Rating updated successfully',
                'data' => $user->courses()->where('courses_id', $course_id)->first()->ratings
            ], 200);
        } else {
            $user = User::find($user_id);
            $user->courses()->attach($course_id, [
                'rating' => $request->rating,
                'comment' => $request->comment
            ]);

            return response()->json([
                'message' => 'Rating created successfully',
                'data' => $user->courses()->where('courses_id', $course_id)->first()->ratings
            ], 201);
        }
    }


    public function getAll($course_slug)
    {
        $course_id = Course::where('slug', $course_slug)->first()->id;
        $ratings = Course::find($course_id)->users()->wherePivot('courses_id', $course_id)->get();

        return response()->json([
            'message' => 'Get all rating successfully',
            'data' => $ratings
        ], 200);
    }

    public function delete($course_slug)
    {
        $user_id = auth()->user()->id;
        $course_id = Course::where('slug', $course_slug)->first()->id;

        $user = User::find($user_id);
        $user->courses()->detach($course_id);

        return response()->json([
            'message' => 'Rating deleted successfully',
        ], 200);
    }
}
