<?php

namespace Tests\Feature;

use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class GenerateAdminTokenTest extends TestCase
{
    /**
     * @test
     * @return void
     */
    public function CheckTheGenerateAdminTokenRunning(): void
    {
        $this->seed();
        $response = $this->post('api/admin/login', ['phone' => '0790000000', 'password' => 'admin']);

        $response->assertStatus(200)->assertJson(fn(AssertableJson $json) =>
            $json->has('data.token')->hasAll(['data.name', 'data.email', 'data.id', 'data.phone', 'data.image'])
        );
    }
}
