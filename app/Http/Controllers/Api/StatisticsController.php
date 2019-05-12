<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\DialoguePersonService;


class StatisticsController extends Controller
{
    protected $dialoguePersonService;

    public function __construct(DialoguePersonService $dialoguePersonService)
    {
        $this->dialoguePersonService = $dialoguePersonService;
    }

    public function favoriteHours(): array
    {
        return $this->dialoguePersonService->favoriteHours(null);
    }

    public function messagesHistory()
    {
        return $this->dialoguePersonService->messagesHistory(null);
    }

}
