<?php

namespace App\Http\Controllers\Client\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)//: Response
    {
        if (Auth::attempt($request->only(['phone', 'password']))) {
            $user = Auth::user();
            $user['token'] = $user->createToken('user')->plainTextToken;

            return $this->response(new UserResource($user));
        }
        return $this->response(JsonResource::make(['message' => __('auth.failed')]), 401);
    }
}
