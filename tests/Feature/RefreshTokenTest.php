<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RefreshTokenTest extends TestCase
{
    public function testRefreshTokenSuccessfully()
    {
        $payload = array("username" => "saul15", "password" => "superadmin");

        $token = $this->postJson("/api/v1/auth/login", $payload)->json()['data']['access_token'];
        $headers = array("Authorization" => "Bearer $token");
        
        $this->withHeaders($headers)->postJson("/api/v1/auth/refresh")
             ->assertStatus(200)
             ->assertJsonStructure(array(
                "status",
                "data" => array(
                    "access_token",
                    "token_type",
                ),
             ));
    }
}
