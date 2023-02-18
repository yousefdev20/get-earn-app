<?php

namespace App\Http\Controllers;

use App\Http\Resources\ViewResource;
use App\Jobs\NewVisitorJob;
use App\Models\User;
use App\Services\VisitorsWatch;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response
    {
        $visitor = new VisitorsWatch(new NewVisitorJob($request->referred_by, $request->ip()), 'visitor');
        return $this->response($visitor->push());
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @return Response
     */
    public function show(Request $request): Response
    {
        $visitors = User::query()->find($request->referred_by)->visitors()->first();
        $uniqueVisitors = $visitors->watchDetails()->select(['ip_address'])->distinct()->count('ip_address');
        return $this->response(new ViewResource([$visitors->times, $uniqueVisitors]));
    }
}
