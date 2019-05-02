<?php

namespace Tests\ModelBuilders;

use App\DialoguePerson;
use App\TextMessage;
use App\LocationHistory;
use App\TextLocation;
use App\User;

trait TextLocationBuilder
{
    protected function aTextLocation(
        array $overrides = [],
        User $user = null,
        TextMessage $textMessage = null,
        LocationHistory $locationHistory = null,
        DialoguePerson $dialoguePerson = null
    ): TextLocation
    {
        $textLocation = factory(TextLocation::class)->create($overrides);
        $textLocation->user()->associate($user);
        $textLocation->textMessage()->associate($textMessage);
        $textLocation->locationHistory()->associate($locationHistory);
        $textLocation->dialoguePerson()->associate($dialoguePerson);
        return $textLocation;
    }
}
