<?php

namespace App\Http\Controllers\api\v2;

use App\Http\Requests\LocationHistoryRequest;
use App\Http\Resources\LocationHistoryResource;
use App\LocationHistory;
use App\Http\Controllers\Controller; 

class LocationHistoryController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/v2/locations",
     *      operationId="index",
     *      tags={"LocationHistory"},
     *      summary="Get a list of saved location information",
     *      description="Returns location history of a DialoguePerson",
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
    public function index(LocationHistoryRequest $request)
    {
        return LocationHistoryResource::collection(LocationHistory::where('person_id',
                                                $request->input('person_id'))->paginate());
    }
}
