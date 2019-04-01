<?php
/**
 * @OA\Info(title="Text Message and Location History API", version="0.1")
 */
namespace App\Http\Controllers\api\v2;
/**
 * @OA\Get(
 *     path="/api/v2/texts",
 *     @OA\Response(response="200", description="Text Message Resource")
 * )
 */
use App\Http\Requests\TextMessageRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 

class TextMessageController extends Controller
{
    public function index(TextMessageRequest $request)
    {

    }
}
