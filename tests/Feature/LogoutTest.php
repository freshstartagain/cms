<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LogoutTest extends TestCase
{
    public function testUserLogoutSuccessfully()
    {
        $payload = array("username" => "saul15", "password" => "superadmin");

        $token = $this->postJson("/api/v1/auth/login", $payload)->json()['data']['access_token'];
        $headers = array("Authorization" => "Bearer $token");
        
        $this->withHeaders($headers)->postJson("/api/v1/auth/logout")
             ->assertStatus(200)
             ->assertJsonStructure(array(
                "status",
                "message",
             ));
    }
}
