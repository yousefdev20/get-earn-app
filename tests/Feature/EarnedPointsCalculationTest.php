<?php

namespace Tests\Feature;

use App\Services\Wallet\EarnedPoints;
use Tests\TestCase;

class EarnedPointsCalculationTest extends TestCase
{
    /**
     * @test
     * @return void
     */
    public function CheckEarnedPointsServiceIsCoveredAllCases(): void
    {

        // Any test cases shall divide for 3 sections (prepare, action, assertion).
        /**
         * zero and negative number will return 0
         * [1-5] => 5
         * [6-10] => 7
         * [>=11] => 10
         */
        $this->assertEquals(0, EarnedPoints::calculate(-1));
        $this->assertEquals(0, EarnedPoints::calculate(0));
        $this->assertEquals(5, EarnedPoints::calculate(5));
        $this->assertEquals(7, EarnedPoints::calculate(7));
        $this->assertEquals(10, EarnedPoints::calculate(15));
        $this->assertEquals(10, EarnedPoints::calculate(15));
    }
}
