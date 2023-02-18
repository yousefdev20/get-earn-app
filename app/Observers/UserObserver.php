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
        $this->refreshWallet($user->referred_by);
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param User $user
     * @return void
     */
    public function deleted(User $user): void
    {
        $user->wallet()->delete();
        $this->refreshWallet($user->referred_by);
    }

    /**
     * Handle the User "restored" event.
     *
     * @param User $user
     * @return void
     */
    public function restored(User $user): void
    {
        $user->wallet()->restore();
        $this->refreshWallet($user->referred_by);
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param User $user
     * @return void
     */
    public function forceDeleted(User $user): void
    {
        $user->wallet()->delete();
        $this->refreshWallet($user->referred_by);
    }

    private function refreshWallet(int $id): void
    {
        if ($id) {
            $referredBy = User::query()->withCount(['referrals'])->find($id);
            $referredBy->wallet()->update(['points' => EarnedPoints::calculate($referredBy['referrals_count'])]);
        }
    }
}
