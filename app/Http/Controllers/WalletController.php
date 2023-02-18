<?php

namespace App\Http\Controllers;

use App\Http\Resources\WalletResource;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Response;

class WalletController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(int $id): Response
    {
        return $this->response(new WalletResource(Wallet::query()->find($id)));
    }

    public function getWalletByUser(int $user_id): Response
    {
        return $this->response(new WalletResource(User::query()->find($user_id)->wallet()->first()));
    }
}
