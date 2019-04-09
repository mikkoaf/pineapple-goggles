<?php
/**
 * @OA\Info(title="Text Message and Location History API", version="0.1")
 */
namespace App\Http\Controllers\api;

use App\Http\Requests\TextMessageRequest;
use App\Http\Resources\TextMessageResource;
use App\TextMessage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 

class TextMessageController extends Controller
{
    /**
     * Returns text messages of a DialoguePerson
     * @OA\Get(
     *      path="/api/texts",
     *      operationId="index",
     *      tags={"Text Messages"},
     *      summary="Get a list of text messages",
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
     *       
     *     )
     */
    public function index(TextMessageRequest $request)
    {
        return TextMessageResource::collection(TextMessage::where('person_id',
                                                $request->input('person_id'))->paginate());
    }
}
