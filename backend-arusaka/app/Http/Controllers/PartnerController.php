<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    public function getAll()
    {
        $partners = Partner::all();
        return response()->json([
            'message' => 'Success',
            'data' => $partners
        ], 200);
    }

    public function getDetailPartner(Request $request, $slug)
    {
        $partner = Partner::where('name', $slug)->first();
        if($partner){
            return response()->json([
                'message' => 'Success',
                'data' => $partner
            ], 200);
        }else{
            return response()->json([
                'message' => 'Partner Not Found'
            ], 404);
        }
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
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $uploadApi = new UploadApi();
        $result = $uploadApi->upload($imageUrl, ['resource_type' => 'auto']);

        //delete storage
        Storage::delete($path);
        return $result;
    }

    public function store(Request $request)
    {
        // Have image upload
        if ($request->hasFile('image_profile')) {
            $image = $request->file('image_profile');
            $result = $this->uploadImage($image);
            $partner = Partner::create([
                'name' => $request->name,
                'email' => $request->email,
                'contact' => $request->contact,
                'address' => $request->address,
                'image_profile' => $result['secure_url'],
            ]);
            return response()->json([
                'message' => 'Success',
                'data' => $partner
            ], 200);
        } else {
            $partner = Partner::create([
                'name' => $request->name,
                'email' => $request->email,
                'contact' => $request->contact,
                'address' => $request->address,
            ]);
            return response()->json([
                'message' => 'Success',
                'data' => $partner
            ], 200);
        }
    }

    // update partner based on id
    public function editPartner(Request $request, $slug)
    {
        // check if there is upload new image
        if ($request->hasFile('image_profile')) {
            $image = $request->file('image_profile');
            $result = $this->uploadImage($image);
            $partner = Partner::where('name', $slug)->first();
            $partner->update([
                'name' => $request->name,
                'email' => $request->email,
                'contact' => $request->contact,
                'address' => $request->address,
                'image_profile' => $result['secure_url'],
            ]);
            return response()->json([
                'message' => 'Success',
                'data' => $partner
            ], 200);
        } else {
            $partner = Partner::where('name', $slug)->first();
            $partner->update([
                'name' => $request->name,
                'email' => $request->email,
                'contact' => $request->contact,
                'address' => $request->address,
            ]);
            return response()->json([
                'message' => 'Success',
                'data' => $partner
            ], 200);
        }
    }

    public function deletePartner($slug){
        $partner = Partner::where('name', $slug)->first();
        if(!$partner){
            return response()->json([
                'message' => 'Partner Not Found'
            ], 404);
        }
        $partner->delete();
        return response()->json([
            'message' => 'Delete Success',
        ], 200);
    }
}
