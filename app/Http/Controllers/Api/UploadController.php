<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;


class UploadController extends Controller
{
    /**
     * Returns text messages of a DialoguePerson
     * @OA\Post(
     *      path="/api/upload",
     *      tags={"File upload"},
     *      summary="Upload files",
     *     @OA\Parameter(
     *         name="upload",
     *         in="body",
     *         description="Limit the number of items per query",
     *         required=false,
     *         explode=true,
     *         @OA\Schema(
     *             type="file"
     *         )
     *     ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation"
     *       ),
     *       @OA\Response(response=400, description="Bad request"),
     *
     *    )
     *
     * https://stackoverflow.com/questions/46633582/laravel-file-upload-api-using-postman
     *
     * https://laravel.com/docs/5.8/filesystem
     *
     * stores files uploaded correctly to storage/app/public
     *
     * @param Request $request
     */
    public function upload(Request $request)
    {
        $file = $request->file('upload');
        if (!empty($file)) {
            Storage::put($file->getClientOriginalName(), file_get_contents($file));
        }
    }
}
