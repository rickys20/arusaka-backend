<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;
use Illuminate\Support\Facades\Storage;


class CategoriesController extends Controller
{
    public function getAll(Request $request)
    {
        $limit = $request->query('limit', 10); // Jumlah pengguna per halaman (default: 10)
        $page = $request->query('page'); // Halaman yang ditampilkan (default: 1)

        $Campuses = Categories::paginate($limit, ['*'], 'page', $page);

        return response()->json([
            'status' => 'success',
            'data' => $Campuses,
        ], 200);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'category_name' => 'required',
            'image' => 'required|image'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $result = $this->uploadImage($request->file('image'));

        $category = new Categories();
        $category->name = $request->category_name;
        $category->slug = Str::slug($request->category_name);
        $category->image =  $result['secure_url'];
        $category->save();

        return response()->json([
            'message' => 'category registered successfully',
            'data' => $category,
        ], 201);
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
