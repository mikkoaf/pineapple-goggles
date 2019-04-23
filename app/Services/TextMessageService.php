<?php

namespace App\Services;

use App\Repositories\TextMessageRepository;
use Illuminate\Http\Request;

class TextMessageService
{
    public function __construct(TextMessageRepository $textMessageRepository)
    {
        $this->textMessage = $textMessageRepository;
    }

    public function index()
    {
        return $this->textMessage->all();
    }

    public function create($attributes)
    {
        return $this->textMessage->create($attributes);
    }

    public function read($id)
    {
        return $this->textMessage->find($id);
    }

    public function update(Request $request, $id)
    {
        $attributes = $request->all();

        return $this->textMessage->update($id, $attributes);
    }

    public function delete($id)
    {
        return $this->textMessage->delete($id);
    }
}
