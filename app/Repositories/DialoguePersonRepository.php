<?php

namespace App\Repositories;

use App\DialoguePerson;

class DialoguePersonRepository
{

    protected $dialoguePerson;

    public function __construct(DialoguePerson $dialoguePerson)
    {
        $this->dialoguePerson = $dialoguePerson;
    }
    public function create($attributes)
    {
        return $this->dialoguePerson->create($attributes);
    }

    public function all()
    {
        return $this->dialoguePerson::all();
    }

    public function find($id)
    {
        return $this->dialoguePerson->find($id);
    }

    public function findPerson($user_id, $person_name)
    {
        return $this->dialoguePerson::where('person_name', $person_name)
                                    ->where('user_id', $user_id)
                                    ->first();
    }

    public function update($id, array $attributes)
    {
        return $this->dialoguePerson->find($id)->update($attributes);
    }

    public function delete($id)
    {
        return $this->dialoguePerson->find($id)->delete();
    }
}
