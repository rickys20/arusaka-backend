<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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

    public function store(Request $request)
    {
        // validate first
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:partners',
            'contact' => 'required',
            'address' => 'required',
            'logo' => 'required|image'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $partner = new Partner();

        $image = $this->uploadImage($request->file('logo'));

        $partner->name = $request->name;
        $partner->slug = Str::slug($request->name);
        $partner->logo = $image['secure_url'];
        $partner->email = $request->email;
        $partner->contact = $request->contact;
        $partner->address = $request->address;

        $partner->save();
        return response()->json([
            'message' => 'Success',
            'data' => $partner
        ], 200);
    }

    // update partner based on id
    public function editPartner(Request $request, $slug)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:partners',
            'contact' => 'required',
            'address' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $partner = Partner::where('slug', $slug)->first();
        if(!$partner){
            return response()->json([
                'message' => 'Partner Not Found'
            ], 404);
        }

        $partner->name = $request->name;
        $partner->email = $request->email;
        $partner->contact = $request->contact;
        $partner->address = $request->address;
        $partner->save();

        return response()->json([
            'message' => 'Success',
            'data' => $partner
        ], 200);
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
