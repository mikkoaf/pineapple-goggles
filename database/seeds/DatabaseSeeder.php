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
            $diaPeople = factory(DialoguePerson::class, random_int( 0 , 5 ))->create([
                'user_id' => $user->id
            ]);
            foreach ($diaPeople as $person)
            {
                $messages = factory(TextMessage::class, 50)->create([
                    'user_id' => $person->user_id,
                    'person_id' => $person->id,
                    'person_name' => $person->person_name
                ]);
                $locations = factory(LocationHistory::class, 50)->create([
                    'user_id' => $person->user_id,
                    'person_id' => $person->id,
                ]);
            }
        }

        // for each dialogue person, make some


    }
}
