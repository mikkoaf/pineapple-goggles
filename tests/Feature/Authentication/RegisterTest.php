<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Faker\Generator as Faker;

class RegisterTest extends TestCase
{
    use DatabaseTransactions;
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
            'password' => 'äabc123#',

        ];
        $response = $this->post('/api/register', $payload);

        $response->assertStatus(201);
    }

    /**
     * Test registering with missing data
     */

    /**
     * Test registering with weak password
     */

    /**
     * Test registering with duplicate credentials
     */
}
