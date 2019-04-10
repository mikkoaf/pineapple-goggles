<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

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
}