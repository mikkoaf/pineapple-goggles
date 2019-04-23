<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\LocationHistoryRequest;
use App\Http\Resources\LocationHistoryResource;
use App\LocationHistory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LocationHistoryController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/locations",
     *      operationId="index",
     *      tags={"LocationHistory"},
     *      summary="Get a list of saved location information",
     *      description="Returns location history of a DialoguePerson",
     *      @OA\Parameter(
     *         name="person-id",
     *         in="query",
     *         description="Person id required for identification",
     *         required=true,
     *         explode=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *      @OA\Parameter(
     *         name="timestamp",
     *         in="query",
     *         description="Timestamp for querying later history information",
     *         required=false,
     *         explode=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
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
     * @param LocationHistoryRequest
     * @return
     *
     */
    public function index(LocationHistoryRequest $request)
    {
        return LocationHistoryResource::collection(LocationHistory::where(
            'person_id', $request->input('person_id')
            )
            ->where('user_id', Auth::id())
            ->paginate());
    }
}
