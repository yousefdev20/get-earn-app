<?php

namespace App\Http\Controllers;

use App\Http\Resources\UsersResource;
use App\Models\User;
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
        return (new UsersResource(User::query()->withCount(['referrals'])->simplePaginate(10)));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return Response
     */
    public function destroy(User $user): Response
    {
        return $this->response($user->delete());
    }
}
