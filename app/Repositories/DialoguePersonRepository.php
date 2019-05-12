<?php

namespace App\Repositories;

use App\DialoguePerson;
use App\Http\Traits\TimeMappingTrait;
use App\TextMessage;
use DateInterval;
use DatePeriod;
use DateTime;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DialoguePersonRepository
{
    use TimeMappingTrait;

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

    /**
     * @param DialoguePerson $dialoguePerson
     * @return array
     * @throws Exception
     */
    public function favoriteMessageHours(DialoguePerson $dialoguePerson = null): array
    {
        $array = [];
        foreach ($this->halfHourTimes() as $time) {
            if($dialoguePerson !== null) {
                $array[$time] = $dialoguePerson
                    ->textMessages
                    ->whereBetween(
                        'time',
                        [
                            $time,
                            DateTime::createFromFormat('H.i', $time)
                                ->add(new DateInterval('PT30M'))
                                ->format('H.i')
                        ]
                    )
                    ->count();
            } else {
                $stamp = [];
                $stamp['time'] = $time;
                $stamp['count'] = DB::table('text_messages')->whereBetween(
                    'time',
                    [
                        $time,
                        DateTime::createFromFormat('H.i', $time)
                            ->add(new DateInterval('PT30M'))
                            ->format('H.i')
                    ]
                )
                    ->count();
                $array[] = $stamp;
            }
        }
        return $array;
    }

    /**
     * @param DialoguePerson $dialoguePerson
     * @return array
     */
    public function messagesHistory(DialoguePerson $dialoguePerson = null): array
    {
        $array = [];
        // find the first and last messaging day for the person
        if ($dialoguePerson !== null){
            $oldestMessage = TextMessage::where('dialogue_person_id', $dialoguePerson->id);
            $latestMessage = TextMessage::where('dialogue_person_id', $dialoguePerson->id);
        } else {
            $oldestMessage = TextMessage::whereNotNull('dialogue_person_id');
            $latestMessage = TextMessage::whereNotNull('dialogue_person_id');
        }
        $oldestMessage = $oldestMessage->orderby('date', 'ASC')->firstOrFail();
        $latestMessage = $latestMessage->orderby('date', 'DESC')->firstOrFail();
        try {
            $period = new DatePeriod(
                new DateTime($oldestMessage->date),
                new DateInterval('P1D'),
                new DateTime($latestMessage->date)
            );
        } catch (Exception $e) {
        }
        foreach ($period as $day) {
            if ($dialoguePerson !== null) {
                $array[$day->format('d.m.Y')] = TextMessage::where('dialogue_person_id', $dialoguePerson->id)->where('date', $day)->count();
            } else {
                $array[$day->format('d.m.Y')] = TextMessage::where('date', $day)->count();
            }
        }
        return $array;
    }
}
