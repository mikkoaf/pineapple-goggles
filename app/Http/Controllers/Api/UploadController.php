<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;


class UploadController extends Controller
{
    /**
     * Post your person's details
     * @OA\Post(
     *      path="/api/upload",
     *      tags={"File upload"},
     *      summary="Upload files",
     *      @OA\RequestBody(
     *          description="A file containing locationdata or text messages",
     *          @OA\MediaType(
     *              mediaType="application/octet-stream",
     *              @OA\Schema(
     *                  type="string",
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="successful operation"
     *       ),
     *       @OA\Response(response=400, description="Bad request"),
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
