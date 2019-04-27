<?php

namespace Tests\ModelBuilders;

use App\DialoguePerson;
use App\LocationHistory;
use App\TextLocation;
use App\TextMessage;
use App\User;

trait DialoguePersonBuilder
{
    /**
     * Builder for a person with full history information with 10 to 30:
     * Text Message
     * Location History
     *
     * And has generated
     * Text Locations
     *
     * @param array
     * @return DialoguePerson
     * @throws \Exception
     */
    protected function aDialoguePersonWithFullHistory(
        array $overrides = [],
        User $user = null
    ): DialoguePerson
    {
        $person = factory(DialoguePerson::class)->create($overrides);
        if($user)
        {
            $person->user()->associate($user);
        }

        // TODO: clean up,
        // Use associations?
        for( $i = 0; $i<random_int( 10 , 30 ); $i++ ) {
            $textMessage = factory(TextMessage::class)->create([
                'user_id' => $person->user_id,
                'person_id' => $person->id,
                'person_name' => $person->person_name,
                ]);

            $locationHistory = factory(LocationHistory::class)->create([
                'user_id' => $person->user_id,
                'person_id' => $person->id,
                ]);

            $textLocation = factory(TextLocation::class)->create([
                'user_id' => $person->user_id,
                'person_id' => $person->id,
                'text_message_id' => $textMessage->id,
                'location_history_id' => $locationHistory->id,
            ]);
        }

        return $person;
    }

}
