<?php

namespace Tests\Feature;

use Tests\TestCase;

class TextMessageTest extends TestCase
{
    //use RefreshDatabase;

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testTextMessageRoute()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * TODO:
     */
    public function testUserCanRequestTextsHasNone()
    {
        // Authenticate a user
        $this->authenticateUser();
        $this->get('/api/texts')
            ->assertStatus(200)
            ->assertJsonStructure([

            ]);
        // The following are quite common events, something to do with
        // model builders?

        // Add texts dialogue people for user

        // Add texts to dialogue people

        //

    }
}
