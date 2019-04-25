<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\User;
use Illuminate\Support\Facades\Auth; 

/**
 * Class UserController
 *
 * Simple User login controller.
 *
 * TODO: refactor
 * ie. validations to a separate RegisterRequest
 *
 *
 * @package App\Http\Controllers
 */
class UserController extends Controller 
{

public $successStatus = 200;


    /**
     * @OA\Post(
     *     path="/api/login",
     *     tags={"Users"},
     *     summary="Login as a user",
     *     requestBody={"$ref": "#/components/requestBodies/Register"},
     *     @OA\Response(
     *          response=200,
     *          description="Successfully login, greetings!"
     *     )
     *
     * )
     * @return \Illuminate\Http\Response
     */
    public function login(){ 
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')-> accessToken; 
            return response()->json(['success' => $success], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 
    }
    
    /** 
     * @OA\Post(
     *     path="/api/register",
     *     tags={"Users"},
     *     summary="Register a user",
     *     requestBody={"$ref": "#/components/requestBodies/Register"},
     *     @OA\Response(
     *          response=201,
     *          description="Successfully registered, greetings!"
     *     )
     *
     * )
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function create(RegisterRequest $request)
    { 
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        // TODO: check for no duplicates here or request?
        User::create($input);
        return response()->json('Welcome ' . $input['name'],201);

    }

    /** 
     * details api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function details() 
    { 
        $user = Auth::user(); 
        return response()->json(['success' => $user], $this-> successStatus);
    } 
}
