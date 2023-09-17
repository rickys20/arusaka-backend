<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Exception;
use App\Models\User;
use App\Models\Campus;
use Carbon\Carbon;
use Cloudinary\Cloudinary;
use Cloudinary\Api\Admin\AdminApi;
use Cloudinary\Tag\ImageTag;
use Cloudinary\Transformation\Background;
use Cloudinary\Transformation\Resize;
use Illuminate\Validation\Rule;
use Symfony\Contracts\Service\Attribute\Required;
use Laravel\Passport\HasApiTokens;


use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Psy\CodeCleaner\FunctionContextPass;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'password_confirmation' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password_confirmation);
        $user->save();

        $token = $user->createToken('authToken', ['*'], Carbon::now()->addHour(10));

        return response()->json([
            'message' => 'User registered successfully',
            'access_token' => $token,
        ], 201);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $credentials = $request->only('email', 'password');
        // dd($request);
        if (Auth::attempt($credentials)) {
            $user = $request->user();
            $token = $user->createToken('authToken', ['*'], Carbon::now()->addHour(10));

            return response()->json([
                'message' => 'Login successful',
                'access_token' => $token,
            ], 200);
        } else {
            return response()->json([
                'message' => 'Invalid login credentials',
            ], 401);
        }
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        if (!$user) {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }
        $user->tokens()->delete();
        return response()->json([
            'message' => 'Logout successful',
        ], 200);
    }

    public function profile(Request $request)
    {
        try {
            $userLogin = auth()->user();
            if (!$userLogin) {
                return response()->json([
                    'message' => 'Unauthorized',
                ], 401);
            }
            $user = Auth::user();

            return response()->json([
                'message' => 'Profile retrieved successfully',
                'user' => $user,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Profile retrieved failed',
            ], 400);
        }
    }

    public function update(Request $request)
    {
        $user = auth()->user(); // Get the authenticated user

        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'sometimes|string|min:8',
            'mobile_phone' => 'sometimes|string|min:8',
            'address' => 'sometimes|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Update user data based on the request
        // if provided
        if ($request->has('name')) {
            $user->name = $request->name;
        }

        if ($request->has('email')) {
            $user->email = $request->email;
        }

        // Update password if 'password' is provided
        if ($request->has('password')) {
            $this->updatePassword($user, $request->password, $request->old_password);
        }

        if ($request->has('mobile_phone')) {
            $user->mobile_phone = $request->mobile_phone;
        }
        if ($request->has('address')) {
            $user->address = $request->address;
        }
        $user->save();

        $newToken = $user->createToken('authToken', ['*'], Carbon::now()->addHour(10));

        return response()->json([
            'message' => 'Profile updated successfully',
            'user' => $user,
            'access_token' => $newToken,
        ]);
    }

    public function updatePassword(Request $request)
    {
        $user = auth()->user(); // Get the authenticated user

        $validator = Validator::make($request->all(), [
            'old_password' => 'required|string|min:8',
            'password' => 'required|string|min:8',
            'password_confirmation' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Verify that the old password matches before updating
        if (!Hash::check($request->old_password, $user->password)) {
            return response()->json(['message' => 'Old password is incorrect'], 400);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json([
            'message' => 'Password updated successfully',
        ]);
    }


}
