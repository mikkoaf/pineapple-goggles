<?php

namespace Tests\Feature;

use Tests\TestCase;

class TextLocationTest extends TestCase
{

    public function testRouteFails()
    {
        $this->get('/api/text-locations')->assertStatus(403);
    }

    /**
     * A basic functional test example.
     *
     * @return void
     *
    public function testTextLocationRoute()
    {
        $response = $this->get('/api/text-locations');//, ['person-id' => 1]);

        $response->assertJsonStructure([
            'data',
            'links',
            'meta',
        ]);
    }

    public function testUserCanGetAllTextLocations()
    {

    }
     */
}
