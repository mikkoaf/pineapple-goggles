<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
//use Illuminate\Foundation\Testing\WithoutMiddleware;

class TextLocationTest extends TestCase
{
    //use //RefreshDatabase;//, WithoutMiddleware;

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testTextLocationRoute()
    {
        $response = $this->get('/api/text-locations?person-id=1');//, ['person-id' => 1]);

        $response->assertJsonStructure([
            'data',
            'links',
            'meta',
        ]);
    }
}