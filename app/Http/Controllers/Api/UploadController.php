<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;


class UploadController extends Controller
{
    /**
     *
     * https://stackoverflow.com/questions/46633582/laravel-file-upload-api-using-postman
     *
     * @param Request $request
     */
    public function upload(Request $request)
    {
        $files = $request->file('upload');
        if(!empty($files)) {
            foreach($files as $file) {
                Storage::put($file->getClientOriginalName(),file_get_contents($file));
            }
        }
}
