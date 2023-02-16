<?php

namespace App\Services\Wallet;

use Illuminate\Support\Facades\Config;

class EarnedPoints
{
    static public function calculate(int $referralsCount): int
    {
        $config = Config::get('e-wallet');
        return match (true) {
            $referralsCount <= 0 => 0,
            $referralsCount >= $config[0]['from'] && $referralsCount <= $config[0]['to'] => $config[0]['points'],
            $referralsCount >= $config[1]['from'] && $referralsCount <= $config[1]['to'] => $config[1]['points'],
            $referralsCount >= $config[2]['from'] => $config[2]['points'],
        };
    }
}
