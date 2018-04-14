<?php

namespace Tests\Feature;

use Faker\Factory;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/register');
        $response->assertSee('Name');
        $response->assertStatus(200);
        $faker = Factory::create();
        //Continues Integration/ COntinues Deployment
        $pwd = $faker->password(10);
        $response = $this->post('/register', [
            'name' => $faker->name,
            'email' => $faker->email,
            'password' => $pwd,
            'password_confirmation' => $pwd,
        ]);

        $response->assertRedirect('/home');
    }
}
