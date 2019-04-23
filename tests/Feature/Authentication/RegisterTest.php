<?php

namespace Tests\Feature;

use Tests\TestCase;
use Faker\Generator as Faker;
use App\User;

class RegisterTest extends TestCase
{

    public function testEmptyQuery()
    {
        $this->post('/api/register')->assertStatus(422);
    }

    public function testRegisterValidationErrorBadPassword()
    {
        $payload = [
            'name' => 'ananas',
            'email' => 'testananas@ananas.com',
            'password' => 'password',

        ];
        $response = $this->post('/api/register', $payload);

        $response->assertStatus(422);
    }

    public function testRegisterValidationErrorBadEmail()
    {
        $payload = [
            'name' => 'ananas',
            'email' => 'testananasananas.com',
            'password' => 'Password1!',

        ];
        $response = $this->post('/api/register', $payload);

        $response->assertStatus(422);
    }

    public function testRegisterValidationErrorNoName()
    {
        $payload = [
            'email' => 'testananas@ananas.com',
            'password' => 'Password1!',

        ];
        $response = $this->post('/api/register', $payload);

        $response->assertStatus(422);
    }

    /**
     * A test which should always pass.
     *
     * @return void
     */
    public function testRegisterProper()
    {
        $payload = [
            'name' => 'ananas',
            'email' => 'testananas@ananas.com',
            'password' => 'Sabc123#',

        ];
        $response = $this->post('/api/register', $payload);

        $response->assertStatus(201);
    }


    public function testRegisterSameEmail()
    {
        User::create([
            'name' => 'ananas',
            'email' => 'testananas@ananas.com',
            'password' => 'Sabc123#',
        ]);
        $payload = [
            'name' => 'ananas',
            'email' => 'testananas@ananas.com',
            'password' => 'Sabc123#',

        ];
        $response = $this->post('/api/register', $payload);

        $response->assertStatus(403);
    }
}
