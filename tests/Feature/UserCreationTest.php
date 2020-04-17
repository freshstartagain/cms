<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserCreationTest extends TestCase
{
    public function testUserLoginSuccessfully()
    {
        $payload = array("username" => "saul15", "password" => "superadmin");

        $this->postJson("/api/v1/auth/login", $payload)
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
