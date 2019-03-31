<?php

namespace App\Http\Controllers\api\v2;

use App\Http\Requests\LocationHistoryRequest;
use App\Http\Controllers\Controller; 

class LocationHistoryController extends Controller
{
    //
    public function index(LocationHistoryRequest $request)
    {
        return 'locations';
    }
}
