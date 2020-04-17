<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Faker;

class LoginTest extends TestCase
{

    public function testUserCreationSuccessfully()
    {
        $faker = Faker\Factory::create();
        
        $payload = array(
            "firstname" => $faker->firstName(), 
            "middlename" => $faker->lastName(),
            "lastname" => $faker->lastName(),
            "email" => $faker->email(),
            "username" => $faker->userName(),
            "password" => "test123",
            "password_confirmation" => "test123",
            "mobile" => 9238459822,   
        );
        
        dump($payload['mobile']);

        $this->postJson("/api/v1/auth/register", $payload)
             ->assertStatus(201)
             ->assertJsonStructure(array(
                "status",
                "data" => array(
                    "firstname",
                    "middlename",
                    "lastname",
                    "email",
                    "username",
                    "mobile",
                    "address_id",
                    "position_id",
                    "updated_at",
                    "created_at",
                    "id",
                ),
             ));
    }
}
