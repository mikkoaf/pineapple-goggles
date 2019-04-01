<?php
/**
 * @OA\Info(title="Text Message and Location History API", version="0.1")
 */
namespace App\Http\Controllers\api\v2;

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
     *      path="/api/v2/texts",
     *      operationId="index",
     *      tags={"TextMessages"},
     *      summary="Get a list of text messages",
     *      @OA\Response(
     *          response=200,
     *          description="successful operation"
     *       ),
     *       @OA\Response(response=400, description="Bad request"),
     *       security={
     *           {"api_key_security_example": {}}
     *       }
     *     )
     */
    public function index(TextMessageRequest $request)
    {
        return TextMessageResource::collection(TextMessage::where('person_id',
                                                $request->input('person_id'))->paginate());
    }
}
