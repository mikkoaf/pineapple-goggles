<?php

namespace App\Repositories;

use App\DialoguePerson;
use DateInterval;
use DateTime;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class DialoguePersonRepository
{

    /**
     * @var DialoguePerson
     */
    protected $dialoguePerson;

    /**
     * DialoguePersonRepository constructor.
     * @param DialoguePerson $dialoguePerson
     */
    public function __construct(DialoguePerson $dialoguePerson)
    {
        $this->dialoguePerson = $dialoguePerson;
    }

    /**
     * @param $attributes
     * @return mixed
     */
    public function create($attributes)
    {
        return $this->dialoguePerson->create($attributes);
    }

    /**
     * @return DialoguePerson[]|Collection
     */
    public function all(): Collection
    {
        return $this->dialoguePerson::all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->dialoguePerson->find($id);
    }

    /**
     * TODO: rights management not a repository task
     *
     * @param $user_id
     * @param $person_name
     * @return mixed
     */
    public function findPerson($user_id, $person_name)
    {
        return $this->dialoguePerson::where('person_name', $person_name)
                                    ->where('user_id', $user_id)
                                    ->first();
    }

    /**
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function update($id, array $attributes)
    {
        return $this->dialoguePerson->find($id)->update($attributes);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->dialoguePerson->find($id)->delete();
    }
}
