<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Exception;
use App\Models\User;
use App\Models\ResetPassword;
use Illuminate\Http\Request;
use App\Mail\SendCodeResetPassword;
use Illuminate\Support\Facades\Mail;

class ResetPasswordController extends Controller
{
    public function forgotPassword(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        // return response()->json([
        //     'message' => 'Test',
        // ], 201);

        // Delete all old code that user send before.
        // ResetPassword::where('email', $request->email)->delete();

        // Generate random code
        $random = mt_rand(100000, 999999);
        $data = [
            'email' => $request->email, // Gantikan dengan email yang sesuai
            'token' => $random,
        ];

        // Create a new code
        $codeData = ResetPassword::create($data);

        // Send email to user
        Mail::to($request->email)->send(new SendCodeResetPassword($codeData->code));

        return response(['message' => trans('passwords.sent')], 200);
    }

    public function codecheck(Request $request)
    {
        $request->validate([
            'code' => 'required|string|exists:reset_code_passwords',
        ]);

        // find the code
        $passwordReset = ResetPassword::firstWhere('code', $request->code);

        // check if it does not expired: the time is one hour
        if ($passwordReset->created_at > now()->addHour()) {
            $passwordReset->delete();
            return response(['message' => trans('passwords.code_is_expire')], 422);
        }

        return response([
            'code' => $passwordReset->code,
            'message' => trans('passwords.code_is_valid')
        ], 200);
    }

    public function valid(Request $request)
    {
        $request->validate([
            'code' => 'required|string|exists:reset_code_passwords',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // find the code
        $passwordReset = ResetPassword::firstWhere('code', $request->code);

        // check if it does not expired: the time is one hour
        if ($passwordReset->created_at > now()->addHour()) {
            $passwordReset->delete();
            return response(['message' => trans('passwords.code_is_expire')], 422);
        }

        // find user's email
        $user = User::firstWhere('email', $passwordReset->email);

        // update user password
        $user->update($request->only('password'));

        // delete current code
        $passwordReset->delete();

        return response(['message' =>'password has been successfully reset'], 200);
    }
}
