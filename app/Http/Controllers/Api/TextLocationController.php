<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\TextLocationResource;
use App\Http\Controllers\Controller;
use App\Services\TextLocationService;

class TextLocationController extends Controller
{
    protected $textLocationService;

    public function __construct(TextLocationService $textLocationService)
    {
        $this->textLocationService = $textLocationService;
    }


    /**
     * @OA\Get(
     *      path="/api/text-locations",
     *      operationId="index",
     *      tags={"LocationHistory", "Text Messages"},
     *      summary="Get a list of saved location information linked to text messages",
     *      description="Returns text location history of a DialoguePerson",
     *     @OA\Parameter(
     *         name="limit",
     *         in="query",
     *         description="Limit the number of items per query",
     *         required=false,
     *         explode=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation"
     *       ),
     *       @OA\Response(response=400, description="Bad request"),
     *       security={
     *           {"api_key_security_example": {}}
     *       }
     *     )
     *
     * Returns a bunch of LocationHistories
     */
    public function index()
    {
        return TextLocationResource::collection($this->textLocationService->index());
    }
}
