<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class ApiTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    public function test_registration()
    {


        // Create a dummy user
        $user = User::factory()->create();

        // Generate a Sanctum token for the user
        $token = $user->createToken('api-token')->plainTextToken;

        // Set the Authorization header with the Bearer token
        $headers = [
            'Authorization' => 'Bearer ' . $token,
        ];

        // Make a GET request to the /exercises endpoint
        $response = $this->get('/api/exercises', $headers);

        $response->assertStatus(200);
        // Add additional assertions as needed
    }
}