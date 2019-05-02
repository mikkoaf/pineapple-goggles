<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\User;

class UserModelTest extends TestCase
{
    /**
     * @var User
     */
    protected $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = new User();
    }

    public function testNothing()
    {
        $this->assertTrue(true);
    }
}
