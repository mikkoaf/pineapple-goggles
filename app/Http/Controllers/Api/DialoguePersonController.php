<?php

namespace App\Http\Controllers\Api;

use App\DialoguePerson;
use App\Http\Resources\DialoguePersonResource;
use App\Http\Controllers\Controller;
use App\Services\DialoguePersonService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Response;


class DialoguePersonController extends Controller
{
    protected $dialoguePersonService;

    public function __construct(DialoguePersonService $dialoguePersonService)
    {
        $this->dialoguePersonService = $dialoguePersonService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return
     */
    public function index(): AnonymousResourceCollection
    {
        // return DialoguePersonResource::collection(DialoguePerson::where('user_id', Auth::id())
        return DialoguePersonResource::collection($this->dialoguePersonService->index());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request): \Illuminate\Http\Response
    {
        $this->dialoguePersonService->create($request->all());

        return Response::make('',204);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): Response
    {
        $this->dialoguePersonService->delete($id);

        return Response::make('',204);
    }
}
