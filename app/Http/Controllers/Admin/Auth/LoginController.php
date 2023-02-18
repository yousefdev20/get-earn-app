<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdminResource;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request): Response
    {
        $admin = Admin::query()->where('phone', $request->phone)->first();

        if (! $admin || ! Hash::check($request->password, $admin->password)) {
            return $this->response(JsonResource::make(['message' => __('auth.failed')]), 401);
        }
        $admin['token'] = $admin->createToken('admin')->plainTextToken;
        return $this->response(new AdminResource($admin));
    }
}
