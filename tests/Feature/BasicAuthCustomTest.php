<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use \Database\Seeders\Tests\UserBasic;

class BasicAuthCustomTest extends TestCase
{
    use RefreshDatabase;

    protected $seederClass = UserBasic::class;

    /**
     * A test feature of auth basic is available.
     */
    public function test_auth_basic_is_available(): void
    {
        $response = $this->get($this->routeTest . '/middleware-auth-basic');

        // 401 is mean that route available and we not add any credentials to it
        $response->assertStatus(401);
    }
    public function test_auth_basic_is_available_with_credentials(): void
    {
        $this->seed($this->seederClass);

        $response = $this->withBasicAuth($this->seederClass::$email, $this->seederClass::$password)->get($this->routeTest . '/middleware-auth-basic');

        $response->assertStatus(200);

        $response->assertExactJson([
            'message' => 'Auth Basic Custom Works!'
        ]);
    }
}
