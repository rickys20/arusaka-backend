<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\CourseOrder;
use App\Models\Course;
use Illuminate\Support\Str;

class CourseOrderController extends Controller
{
    public function registerCourse(Request $request, $course)
    {
        $checkauth = auth()->user();
        if (!$checkauth) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        $data_slug = Course::where('slug', $course)->first();
        if (!$data_slug) {
            return response()->json([
                'message' => 'Course Not Found',
            ], 404);
        };
        $payment = new Payment();
        $payment->price = $data_slug->price;
        $payment->save();

        $course_order = new CourseOrder();
        $course_order->users_id = $checkauth->id;
        $course_order->courses_id = $data_slug->id;
        $course_order->payments_id = $payment->id;
        $course_order->save();

        return response()->json([
            'message' => 'Course registered',
            $course_order
        ], 201);
    }

    public function getAllCoursetOrder(Request $request)
    {
        $perPage = $request->query('per_page', 10); // Number of packets per page (default: 10)
        $page = $request->query('page', 1); // Page number to retrieve (default: 1)

        $course_order = CourseOrder::with('payment', 'user', 'course')->paginate($perPage, ['*'], 'page', $page);

        return response()->json([
            'status' => 'success',
            'data' => $course_order,
        ], 200);
    }

    public function getUserByCourse (Request $request, $course){
        $perPage = $request->query('per_page', 10); // Number of packets per page (default: 10)
        $page = $request->query('page', 1); // Page number to retrieve (default: 1)

        $data_slug = Course::where('slug', $course)->first();

        $course_order = CourseOrder::where('courses_id', $data_slug->id)->with('payment', 'user')->paginate($perPage, ['*'], 'page', $page);

        return response()->json([
            'status' => 'success',
            'data' => $course_order,
        ], 200);
    }

    public function deleteCourseOrder(Request $request, $course_order){
        $data = CourseOrder::where('id',$course_order)->first();
        if ($data){
            $data->delete();
            return response()->json([
                'message' => 'Delete Success'
            ], 200);

        }else{
            return response()->json([
                'message' => 'Data Not Found'
            ], 400);
        }
    }
}
