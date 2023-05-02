<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\VerificationMail;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'fullname' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'validator_errors' => $validator->errors(),
            ]);
        } else {

            $user = User::create([
                'name' => $request->fullname,
                'role' => "User",
                'email' => $request->email,
                'verification_code' => substr(rand(0,time()),0,6),
                'password' => Hash::make($request->password),
            ]);
        $milData = [
            'title' => 'Verification Email',
            'name' => $user->name,
            'code' => $user->verification_code,
        ];
        Mail::to($user->email)->send(new VerificationMail($milData));
            $token =  $user->createToken('loginToken', ['login'])->plainTextToken;
            return response()->json([
                'status' => 200,
                'data' => $user,
                'message' => 'Registeration Successful',
            ]);
        }
    }
 public function verifyEmail(Request $request)
 {
    $validator = Validator::make($request->all(), [
          'code' => 'required',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'validator_errors' => $validator->errors(),
        ]);
    } else {
        $user = User::where('verification_code', $request->code)->first();            //slug

        if (!$user) {
            return response()->json([
                'status' => 401,
                'message' => 'Invalid Code!',
            ]);
        } else {
            $user = User::where('verification_code', $request->code)->update([
                'email_verified_at' => Carbon::now(),
                'status' => 1,
            ]);          
            return response()->json([
                'status' => 200,                 
                'message' => 'Email Verified Successfully',
            ]);
        }
    }
 }
    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'validator_errors' => $validator->errors(),
            ]);
        } else {
            $user = User::where('email', $request->email)->first();            //slug

            if (!$user || !Hash::check($request->password, $user->password)) {
                return response()->json([
                    'status' => 401,
                    'message' => 'Invalid Credentials!',
                ]);
            } else {
                               $token = $user->createToken('auth_token', ['login'])->plainTextToken;
                return response()->json([
                    'status' => 200,
                    'token' => $token,
                    'Data' => $user,
                    'message' => 'Logged in Successfully',
                ]);
            }
        }
    }
    public function logout()
    {
        auth()->user()->tokens()->delete();
        return ['message' => 'successfully logged out!'];
    }
}
