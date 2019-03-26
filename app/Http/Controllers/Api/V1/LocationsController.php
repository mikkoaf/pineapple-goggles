<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocationsController extends Controller
{
    public function index()
    {
      return 'you asked for a location';
    }

    public function next()
    {
      throw new Exception();
    }
}
