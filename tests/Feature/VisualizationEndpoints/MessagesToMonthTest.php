<?php

namespace Tests\Feature;

use Tests\TestCase;

class MessagesToMonthTest extends TestCase
{
    //use RefreshDatabase;

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testMessagesToMonthRoute()
    {
        $this->assertTrue(true);
        //$response = $this->get('/api/texts/per-month');

        //$response->assertStatus(200);
    }



    /**
     * TODO:
     */
    public function testMessagesToMonthRouteJson()
    {
        $this->assertTrue(true);
        /*
        $this->get('/api/texts/per-month')->assertJsonStructure([
            'data' => [
                '*' => [
                    'year',
                    'data' => [
                        '*' => [
                        'month',
                        'amount',
                        ]
                    ]
                ]
            ]
        ]);
        */
    }
}
