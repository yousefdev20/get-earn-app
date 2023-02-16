<?php

namespace App\Http\Controllers\Client\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterStoreRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function store(RegisterStoreRequest $request): Response
    {
        $folder = 'images/' . date('Y-m-d');
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path($folder), $imageName);

        $request = $request->validated();
        $request['image'] = $folder .'/'. $imageName;
        $request['password'] = Hash::make($request['password']);

        return $this->response(new UserResource(User::query()->create($request)));
    }
}
