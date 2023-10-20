<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UrlTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    use RefreshDatabase;

    public function test_redirects_if_user_not_logged_in(): void
    {
        $data = [
            'destination' => 'https://example.com',
        ];
        $response = $this->post('/urls', $data);
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function test_dispaly_urls_page(): void
    {
        $response = $this->get('/urls');
        $response->assertStatus(200);
    }
}
