<?php

namespace App\Observers;

use App\Models\User;
use App\Services\Wallet\EarnedPoints;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param User $user
     * @return void
     */
    public function created(User $user): void
    {
        $user->wallet()->create();
        if ($user->referred_by) {
            $referredBy = User::query()->withCount(['referrals'])->find($user->referred_by);
            $referredBy->wallet()->update(['points' => EarnedPoints::calculate($referredBy['referrals_count'])]);
        }
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param User $user
     * @return void
     */
    public function deleted(User $user): void
    {
        $user->wallet()->forceDelete();
    }

    /**
     * Handle the User "restored" event.
     *
     * @param User $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param User $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
