<?php

namespace App\Http\Controllers\api\v1\front;

use App\Http\Controllers\API\ApiController;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends ApiController
{
    public function register(RegisterRequest $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = hash::make($request->password);

        $user->save();
        $token = $user->createToken('register')->plainTextToken;

        $data=[$token,$user];
        return $this->responseSuccess($data,201);
    }
    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if (! $user || ! Hash::check($request->password, $user->password)) {
            return $this->responseError(401);
        }

        $token = $user->createToken('login')->plainTextToken;

        $data=[$token,$user];
        return $this->responseSuccess($data,200);
    }
    public function registershow()
    {
        dd('register page');
    }
    public function loginshow()
    {
        dd('login page');
    }
}
