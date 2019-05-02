<?php
namespace Tests\Unit\DialoguePeople;

use App\DialoguePerson;
use App\Repositories\DialoguePersonRepository;
use App\User;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Tests\ModelBuilders\DialoguePersonBuilder;
use Tests\ModelBuilders\UserBuilder;
use Tests\TestCase;
use Faker\Generator as Faker;

class DialoguePersonTest extends TestCase
{
    use UserBuilder;
    use DialoguePersonBuilder;
    protected $faker;

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->faker = new Faker();
    }

    public function testCanCreateDialoguePerson(): void
    {
        $user = factory(User::class)->create();
        $data = [
            'person_name' =>  'Lari',
            'user_id' => $user->id,
        ];

        $dialoguePersonRepo = new DialoguePersonRepository(new DialoguePerson());
        $dialoguePerson = $dialoguePersonRepo->create($data);

        $this->assertInstanceOf(DialoguePerson::class, $dialoguePerson);
        $this->assertEquals($data['person_name'], $dialoguePerson->person_name);
        $this->assertEquals($data['user_id'], $dialoguePerson->user_id);
    }

    public function testCanFetchAllDialoguePersons(): void
    {
        $user = factory(User::class)->create();
        $dialoguePerson1 = factory(DialoguePerson::class)->create([
            'user_id' => $user->id,
        ]);
        $dialoguePerson2 = factory(DialoguePerson::class)->create([
            'user_id' => $user->id,
        ]);

        $dialoguePersonRepo = new DialoguePersonRepository(new DialoguePerson());
        $dialoguePersonCollection = $dialoguePersonRepo->all();

        $this->assertInstanceOf(Collection::class, $dialoguePersonCollection);
        $this->assertIsIterable($dialoguePersonCollection);
    }

    /**
     * @throws Exception
     */
    public function testCanShowDialoguePerson(): void
    {
        $user = factory(User::class)->create();
        $dialoguePerson = factory(DialoguePerson::class)->create([
            'user_id' => $user->id,
        ]);

        $dialoguePersonRepo = new DialoguePersonRepository(new DialoguePerson());
        $found = $dialoguePersonRepo->find($dialoguePerson->id);

        $this->assertInstanceOf(DialoguePerson::class, $found);
        $this->assertEquals($found->person_name, $dialoguePerson->person_name);
        $this->assertEquals($found->user_id, $dialoguePerson->user_id);
    }

    /**
     *
     */
    public function testCanUpdateDialoguePerson(): void
    {
        $user = factory(User::class)->create();
        $dialoguePerson = factory(DialoguePerson::class)->create([
            'user_id' => $user->id,
        ]);
        $data = [
            'person_name' => 'Lari',
        ];
        $dialoguePersonRepo = new DialoguePersonRepository(new DialoguePerson());
        $updated = $dialoguePersonRepo->update($dialoguePerson->id, $data);

        $this->assertTrue($updated);
        //$this->assertEquals($data['person_name'], $dialoguePerson->person_name);
    }

    public function testCanDeleteDialoguePerson(): void
    {
        $user = factory(User::class)->create();
        $dialoguePerson = factory(DialoguePerson::class)->create([
            'user_id' => $user->id,
        ]);
        $dialoguePersonRepo = new DialoguePersonRepository(new DialoguePerson());
        $deleted = $dialoguePersonRepo->delete($dialoguePerson->id);

        $this->assertTrue($deleted);
    }

    /**
     * @throws Exception
     */
    public function testCanFindFavoriteMessageHours(): void
    {
        $user = factory(User::class)->create();
        $dialoguePerson = $this->aDialoguePersonWithFullHistory([], $user);
        $dialoguePersonRepo = new DialoguePersonRepository(new DialoguePerson());
        $favoriteHoursArray = $dialoguePersonRepo->favoriteMessageHours($dialoguePerson);

        $this->assertIsArray($favoriteHoursArray);
        $this->assertCount(48,$favoriteHoursArray);
        $this->assertArrayHasKey('12.00', $favoriteHoursArray);
    }

    /**
     * Could be a performance intensive test as fakers tend to create completely random dates.
     *
     * @throws Exception
     */
    public function testCanCalculateMessagesHistory(): void
    {
        $user = factory(User::class)->create();
        $dialoguePerson = $this->aDialoguePersonWithFullHistory([], $user);
        $dialoguePersonRepo = new DialoguePersonRepository(new DialoguePerson());
        $messagesHistory = $dialoguePersonRepo->messagesHistory($dialoguePerson);

        $this->assertIsArray($messagesHistory);
    }
}
