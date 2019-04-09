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
        $users = factory(User::class, 3)->create();

        // for each user, make some Dialogue people
        foreach ($users as $user)
        {
            $diaPeople = factory(DialoguePerson::class, random_int( 1 , 5 ))->create([
                'user_id' => $user->id
            ]);
            foreach ($diaPeople as $person)
            {
                for( $i = 0; $i<random_int( 10 , 30 ); $i++ ) {
                    $textLocations = factory(TextLocation::class)->create([
                        'user_id' => $person->user_id,
                        'person_id' => $person->id,
                        'text_id' => factory(TextMessage::class)->create([
                            'user_id' => $person->user_id,
                            'person_id' => $person->id,
                            'person_name' => $person->person_name
                        ])->id,
                        'location_id' => factory(LocationHistory::class)->create([
                            'user_id' => $person->user_id,
                            'person_id' => $person->id,
                        ])->id,
                    ]);
                 }
            }
        }

        // for each dialogue person, make some


    }
}
