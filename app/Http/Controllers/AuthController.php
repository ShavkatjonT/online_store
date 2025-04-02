<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {

        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }


        return $this->success('',  ['token' => $user->createToken($request->email)->plainTextToken]);
    }
    public function register(RegisterRequest $request) {
            $user= User::create($request->validated());
            $user->assignRole('customer');
            if($request->hasFile('photo')){
                $path = $request->file('photo')->store('users/'.$user->id, 'public');
                 $fullName =$request->file('photo')->getClientOriginalName();
                $user->photos()->create([
                    'full_name' => $fullName,
                    'path' => $path,
                ]);
            }
            return $this->success('user created successfully', ['token' => $user->createToken($request->email)->plainTextToken]);
    }

    public function user(Request $request)
    {
        return $this->response(new UserResource($request->user()));
    }

    public function changePassword() {}

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Logged out'
        ]);
    }
}
