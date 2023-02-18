<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VerifyLink
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response|RedirectResponse) $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next): mixed
    {
        try {
            $user = User::query()->where('phone', decrypt($request->referred_by));
            $userExists = $user->exists();
            if ($userExists) {
                $request->merge(['referred_by' => $user->first()->id]);
                return $next($request);
            }
        } catch (Exception $exception) {
            abort(404);
        }
        abort(404);
    }
}
