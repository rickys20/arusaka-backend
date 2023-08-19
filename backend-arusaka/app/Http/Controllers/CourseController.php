<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Course;
use App\Models\Rating;
use Illuminate\Http\Request;
use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    public function getAll()
    {
        $courses = Course::all();
        foreach ($courses as $course) {
            $ratings = Rating::where('courses_id', $course->id);
            $rating = $ratings->avg('rating');
            $course->rating = $rating;
            $course->rating_count = $ratings->count();

        }
        return response()->json([
            'message' => 'Success',
            'data' => $courses
        ], 200);
    }

    public function getActiveCourses()
    {
        $activeCourses = Course::where('status', 'active')->get();
        return response()->json([
            'message' => 'Success',
            'data' => $activeCourses
        ], 200);
    }

    public function getDetailCourse(Request $request, $slug)
    {
        $course = Course::where('slug', $slug)->first();
        return response()->json([
            'message' => 'Success',
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
}
