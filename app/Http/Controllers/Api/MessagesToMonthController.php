<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MessagesToMonthResource;
use App\Services\MessagesToMonthService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Response;


class MessagesToMonthController extends Controller
{
    protected $messagesToMonthService;

    public function __construct(MessagesToMonthService $messagesToMonthService)
    {
        $this->messagesToMonthService = $messagesToMonthService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return
     */
    public function index(): AnonymousResourceCollection
    {

        return MessagesToMonthResource::collection($this->messagesToMonthService->index());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): \Illuminate\Http\Response
    {
        return Response::make('',420);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(): \Illuminate\Http\Response
    {
        return Response::make('',420);
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
    public function edit($id): \Illuminate\Http\Response
    {
        return Response::make('',420);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id): \Illuminate\Http\Response
    {
        return Response::make('',420);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(): \Illuminate\Http\Response
    {
        return Response::make('',420);
    }
}
