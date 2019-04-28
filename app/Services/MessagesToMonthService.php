<?php

namespace App\Services;

use App\Repositories\TextMessageRepository;
use Illuminate\Http\Request;

/**
 *
 * The source for information on monthly activities.
 *
 * Class MessagesToMonthService
 * @package App\Services
 */
class MessagesToMonthService
{
    protected $textMessage;

    public function __construct(TextMessageRepository $textMessageRepository)
    {
        $this->textMessage = $textMessageRepository;
    }

    public function index(): array
    {
        // All text messages...
        $messages = $this->textMessage->all();
        foreach ($messages as $index => $message) {
            Log::info($message);
        }

        return ['key' => 'value'];
    }

    public function create($attributes): bool
    {
        return false;
    }

    public function read($date): array
    {
        return $this->textMessage->find($date);
    }

    public function update(Request $request, $id): bool
    {
        return false;
    }

    public function delete($id): bool
    {
        return false;
    }
}
