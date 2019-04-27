<?php

namespace Tests\ModelBuilders;

use App\DialoguePerson;
use App\User;

trait UserBuilder
{
    /**
     * User model building
     *
     * @param array $overrides
     * @return User
     */
    protected function aUser(array $overrides = []): User
    {
        return factory(User::class)->create($overrides);
    }

    /**
     * TODO: Model of user with items... such as dialoguePeople
     */

    protected function aUserWithDialoguePeople(array $overrides = []): User
    {
        $user = $this->aUser();
        /*
        factory(DialoguePerson::class, random_int( 1 , 5 ))->create([
            'user_id' => $user->id
        ]);
        */
        return $user;
    }
}

