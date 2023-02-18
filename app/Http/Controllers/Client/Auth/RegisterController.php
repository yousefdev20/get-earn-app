<?php

namespace App\Http\Controllers\Client\Auth;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterStoreRequest;
use App\Http\Resources\DailyVisitorChartResource;

class RegisterController extends Controller
{
    public function store(RegisterStoreRequest $request): Response
    {
        $folder = 'images/' . date('Y-m-d');
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path($folder), $imageName);

        $request = $request->validated();
        $request['image'] = $folder . '/' . $imageName;
        $request['password'] = Hash::make($request['password']);

        return $this->response(new UserResource(User::query()->create($request)));
    }

    public function registrationReport(): Response
    {
        $users = auth()->user()->referrals()
            ->select([
                DB::raw('DATE(created_at) as date'),
                DB::raw('COUNT(*) as count')
            ])
            ->groupBy('date')
            ->where('created_at', '>=', Carbon::now()->subDays(14))
            ->get();

        return $this->response(new DailyVisitorChartResource($users));
    }
}
