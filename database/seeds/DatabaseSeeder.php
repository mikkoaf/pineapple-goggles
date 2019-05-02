<?php

use App\DialoguePerson;
use App\User;
use App\TextMessage;
use App\TextLocation;
use App\LocationHistory;
use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder
 */
class DatabaseSeeder extends Seeder
{
    /**
     * @throws Exception
     */
    public function run()
    {
        $this->command->line('Updating stuff...');
        // Make some users
        $users = factory(User::class , 3)->create();

        // for each user, make some Dialogue people
        foreach ($users as $user)
        {
            $this->command->line('Filling user '.$user->id);
            $diaPeople = factory(DialoguePerson::class, random_int( 1 , 3 ))->create([
                'user_id' => $user->id
            ]);
            foreach ($diaPeople as $person)
            {
                for($i = 0, $iMax = random_int(10, 100); $i< $iMax; $i++ ) {
                    factory(TextLocation::class)->create([
                        'user_id' => $person->user_id,
                        'dialogue_person_id' => $person->id,
                        'text_message_id' => factory(TextMessage::class)->create([
                            'user_id' => $person->user_id,
                            'dialogue_person_id' => $person->id,
                            'person_name' => $person->person_name,
                            //'text_location_id' => $i
                        ])->id,
                        'location_history_id' => factory(LocationHistory::class)->create([
                            'user_id' => $person->user_id,
                            'dialogue_person_id' => $person->id,
                            //'text_location_id' => $i,
                        ])->id,
                    ]);
                 }
            }
        }

        // for each dialogue person, make some


    }
}
