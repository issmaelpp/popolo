<?php

namespace App\Http\Controllers;

use App\Models\StateResponse;
use App\Http\Requests\StoreStateResponseRequest;
use App\Http\Requests\UpdateStateResponseRequest;
use App\Services\StateResponseService;

class StateResponseController extends Controller
{
    public function __construct(
        protected StateResponseService $service
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStateResponseRequest $request)
    {
        $this->service->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(StateResponse $stateResponse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StateResponse $stateResponse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStateResponseRequest $request, StateResponse $stateResponse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StateResponse $stateResponse)
    {
        //
    }
}
