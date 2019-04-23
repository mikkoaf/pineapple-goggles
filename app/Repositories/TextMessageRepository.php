<?php

namespace App\Repositories;

use App\TextMessage;

class TextMessageRepository
{

    protected $textMessage;

    public function __construct(TextMessage $textMessage)
    {
        $this->textMessage = $textMessage;
    }
    public function create($attributes)
    {
        return $this->textMessage->create($attributes);
    }

    public function all()
    {
        return $this->textMessage::all();
    }

    public function find($id)
    {
        return $this->textMessage->find($id);
    }

    public function update($id, array $attributes)
    {
        return $this->textMessage->find($id)->update($attributes);
    }

    public function delete($id)
    {
        return $this->textMessage->find($id)->delete();
    }
}
