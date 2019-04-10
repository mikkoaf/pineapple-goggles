<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\TextLocationRequest;
use App\Http\Resources\TextLocationResource;
use App\TextLocation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 

class TextLocationController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/text-locations",
     *      operationId="index",
     *      tags={"LocationHistory", "Text Messages"},
     *      summary="Get a list of saved location information linked to text messages",
     *      description="Returns text location history of a DialoguePerson",
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
     */
    public function index(TextLocationRequest $request)
    {
        return TextLocationResource::collection(TextLocation::where('person_id',
                                                $request->input('person-id'))->paginate());
    }
}
