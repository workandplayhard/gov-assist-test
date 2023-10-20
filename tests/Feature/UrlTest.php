<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\User;
use Tests\TestCase;

class UrlTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_can_user_create_shortened_url(): void
    {
        $user = User::factory()->create();

        $data = [
            'destination' => 'https://example.com',
        ];
        $response = $this->withHeaders([
            'Accept' => 'application/json',
            'X-Requested-With' => 'XMLHttpRequest'
        ])->actingAs($user)
            ->post('/urls', $data);

        $response->assertStatus(200);
        $response->assertJson($data);
    }
}
