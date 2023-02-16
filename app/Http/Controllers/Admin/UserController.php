<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\UsersResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return UsersResource|Response
     */
    public function index(): UsersResource|Response
    {
        return (new UsersResource(User::query()->withCount(['referrals'])->withTrashed()->simplePaginate(10)));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param User $user
     * @return Response
     */
    public function update($id): Response
    {
        return $this->response(User::query()->withTrashed()->find($id)->restore());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return Response
     */
    public function destroy($id): Response
    {
        return $this->response(User::query()->find($id)->delete());
    }
}
