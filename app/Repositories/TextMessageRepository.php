<?php

namespace App\Repositories;

use App\TextMessage;
use Illuminate\Database\Eloquent\Collection;

class TextMessageRepository
{

    protected $textMessage;

    /**
     * TextMessageRepository constructor.
     * @param TextMessage $textMessage
     */
    public function __construct(TextMessage $textMessage)
    {
        $this->textMessage = $textMessage;
    }

    /**
     * @param $attributes
     * @return mixed
     */
    public function create($attributes)
    {
        return $this->textMessage->create($attributes);
    }

    /**
     * @return TextMessage[]|Collection
     */
    public function all(): Collection
    {
        return $this->textMessage::all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->textMessage->find($id);
    }

    /**
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function update($id, array $attributes)
    {
        return $this->textMessage->find($id)->update($attributes);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->textMessage->find($id)->delete();
    }

}
