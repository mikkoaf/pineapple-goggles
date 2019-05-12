<?php

namespace App\Services;

use App\DialoguePerson;
use App\Repositories\DialoguePersonRepository;
use Exception;
use Illuminate\Http\Request;

class DialoguePersonService
{
    public function __construct(DialoguePersonRepository $dialoguePersonRepository)
    {
        $this->dialoguePerson = $dialoguePersonRepository;
    }

    public function index()
    {
        return $this->dialoguePerson->all();
    }

    public function create(Array $attributes)
    {
        return $this->dialoguePerson->create($attributes);
    }

    public function read($id)
    {
        return $this->dialoguePerson->find($id);
    }

    public function findPerson($user_id, $person_name)
    {
        return $this->dialoguePerson->findPerson($user_id, $person_name);
    }

    public function update(Request $request, $id)
    {
        $attributes = $request->all();

        return $this->dialoguePerson->update($id, $attributes);
    }

    public function delete($id)
    {
        return $this->dialoguePerson->delete($id);
    }

    /**
     * @param $dialoguePerson
     * @return array
     * @throws Exception
     */
    public function favoriteHours(DialoguePerson $dialoguePerson = null): array
    {
        return $this->dialoguePerson->favoriteMessageHours($dialoguePerson);
    }

    public function messagesHistory(DialoguePerson $dialoguePerson = null)
    {
        return $this->dialoguePerson->messagesHistory($dialoguePerson);
    }
}
