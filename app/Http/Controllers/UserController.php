<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReferredUsersResource;
use App\Models\User;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function referredUsers(): Response
    {
        return $this->response(new ReferredUsersResource(User::query()->find(auth()->id())->referredUsers()));
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
