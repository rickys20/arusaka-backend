<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Course;
use App\Models\Categories;
use App\Models\Rating;
use Illuminate\Http\Request;
use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    // PUBLIC ROUTE
    public function getActiveCourses(Request $request)
    {
        $query = Course::with('category')->where('status', 'active');
        // Paginate the results with a specified number of items per page (e.g., 10)
        $perPage = $request->query('per_page', 10); // Default to 10 items per page

        // Execute the query and paginate the results
        $filteredCourses = $query->paginate($perPage);

        return response()->json([
            'message' => 'Success',
            'data' => $filteredCourses
        ], 200);
    }

    // USER ROUTE
    public function getActiveCoursesUser(Request $request)
    {
        $user = $request->user();
        if (!$user) {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }
        $perPage = $request->query('per_page', 10); // Default to 10 items per page

        $query = Course::with('category')
            ->where('status', 'active')
            ->whereNotIn('id', function ($query) {
                $query->select('courses_id')
                    ->from('course_orders')
                    ->whereColumn('course_orders.courses_id', 'courses.id')
                    ->where('users_id', auth()->user()->id);
            });

        // Execute the query and paginate the results
        $filteredCourses = $query->paginate($perPage);

        return response()->json([
            'message' => 'Success',
            'data' => $filteredCourses
        ], 200);
    }

    public function myCourse(Request $request)
    {
        $user = $request->user();
        if (!$user) {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }
        $perPage = $request->query('per_page', 10); // Default to 10 items per page

        $query = Course::with('category')
            ->with('materials')
            ->where('status', 'active')
            ->whereIn('id', function ($query) {
                $query->select('courses_id')
                    ->from('course_orders')
                    ->whereColumn('course_orders.courses_id', 'courses.id')
                    ->where('users_id', auth()->user()->id);
            });

        // Execute the query and paginate the results
        $filteredCourses = $query->paginate($perPage);

        return response()->json([
            'message' => 'Success',
            'data' => $filteredCourses
        ], 200);
    }



    // ADMIN ROUTE

    public function getAll()
    {
        $courses = Course::all();
        foreach ($courses as $course) {
            $ratings = Rating::where('courses_id', $course->id);
            $rating = $ratings->avg('rating');
            # case when ratings->avg('rating') is null, then set rating to 0
            if ($rating == null) {
                $rating = 0;
            }
            $course->rating = $rating;
            # if ratings->count() is null, then set rating_count to 0
            $course->rating_count = $ratings->count();
        }
        return response()->json([
            'message' => 'Success',
            'data' => $courses
        ], 200);
    }

    public function getDetailCourse(Request $request, $slug)
    {
        $course = Course::where('slug', $slug)->with(['materials','ratings'])->first();
        return response()->json([
            'message' => 'Success',
            'data' => $course
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:courses',
            'description' => 'required',
            'status' => 'required',
            'image' => 'required|image',
            'price' => 'required',
            'partners_id' => 'required',
            'categories_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $image = $this->uploadImage($request->file('image'));

        $course = new Course();

        $course->name = $request->name;
        $course->slug = Str::slug($request->name);
        $course->description = $request->description;
        $course->status = $request->status;
        $course->image = $image['secure_url'];
        $course->price = $request->price;
        $course->partners_id = $request->partners_id;
        $course->categories_id = $request->categories_id;

        $course->save();

        return response()->json([
            'message' => 'Courses registered successfully',
            'data' => $course
        ], 200);
    }

    public function update(Request $request, $slug)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:courses',
            'description' => 'required',
            'status' => 'required',
            // 'image' => 'required|image',
            'price' => 'required',
            'partners_id' => 'required',
            'categories_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $course = Course::where('slug', $slug)->first();

        // $image = $this->uploadImage($request->file('image'));

        $course->name = $request->name;
        $course->slug = Str::slug($request->name);
        $course->description = $request->description;
        $course->status = $request->status;
        // $course->image = $image['secure_url'];
        $course->price = $request->price;
        $course->partners_id = $request->partners_id;
        $course->categories_id = $request->categories_id;

        $course->save();

        return response()->json([
            'message' => 'Courses updated successfully',
            'data' => $course
        ], 200);
    }

    public function destroy($slug)
    {
        $course = Course::where('slug', $slug)->first();
        $course->delete();

        return response()->json([
            'message' => 'Courses deleted successfully',
            'data' => $course
        ], 200);
    }

    private function uploadImage($image)
    {
        $path = $image->store('public/images');
        $imageUrl = Storage::path($path);

        $my_key = env('CLOUDINARY_API_KEY');
        $my_secret = env('CLOUDINARY_API_SECRET');
        $my_cloud = env('CLOUDINARY_CLOUD_NAME');
        Configuration::instance([
            'cloud' => [
                'cloud_name' => $my_cloud,
                'api_key' => $my_key,
                'api_secret' => $my_secret
            ]
        ]);

        $uploadApi = new UploadApi();
        $result = $uploadApi->upload($imageUrl, ['resource_type' => 'auto']);

        //delete storage
        Storage::delete($path);
        return $result;
    }
}
