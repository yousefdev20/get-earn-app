<?php

namespace App\Http\Resources;

use App\Services\Wallet\EarnedPoints;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * @property mixed $collection
 */
class UsersResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'users' => $this->collection->map(function ($user) {
                return $user->only(['id', 'name', 'email', 'referrals_count', 'status', 'created_at']) +
                    [
                        'total_points_earned' => EarnedPoints::calculate($user['referrals_count'])
                    ];
            })
        ];
    }
}
