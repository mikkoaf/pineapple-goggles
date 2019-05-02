<?php

namespace Tests;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Laravel\Passport\Passport;
use Tests\ModelBuilders\UserBuilder;
use App\User;


abstract class TestCase extends BaseTestCase
{
    use UserBuilder;
    use CreatesApplication;
    use DatabaseTransactions;

    /**
     * Could add authentication as different looking users...
     *
     * @var User
     */
    protected $user;

    protected function authenticateUser()
    {
        $this->user = $this->aUser();
        Passport::actingAs($this->user, ['*'], 'api');
    }
}
