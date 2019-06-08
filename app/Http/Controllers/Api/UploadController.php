<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\UploadRequest;
use App\Jobs\ParseTextLog;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Upload;


class UploadController extends Controller
{
    /**
     * Post your person's details
     * @OA\Post(
     *      path="/api/upload",
     *      tags={"File upload"},
     *      summary="Upload files. Requires authentication",
     *      @OA\RequestBody(
     *          description="A file containing locationdata or text messages. Allowed types are txt, csv and json",
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
     * @return Response
     */
    public function upload(UploadRequest $request)
    {
        $file = $request->file('upload');
        if (!empty($file)) {
            Storage::disk('local')->put($file->getClientOriginalName(), file_get_contents($file));
            $storedFile = Upload::create([
                'user_id' => Auth::id(),
                'filename' => $file->getClientOriginalName()
            ]);
            ParseTextLog::dispatch($storedFile);
            return response()->json(['' => ''], 202);
        }
    }
}
