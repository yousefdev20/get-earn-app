<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class RegisterNewAccountTest extends TestCase
{
    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function RegisterClientAccount(): void
    {
        $user = User::factory(1)->definition();

        $response = $this->post('api/register', $user);
        $response->assertStatus(200);
    }
}
