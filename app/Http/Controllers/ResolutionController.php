<?php

namespace App\Http\Controllers;

use App\Models\Resolution;
use App\Http\Requests\StoreResolutionRequest;
use App\Http\Requests\UpdateResolutionRequest;
use App\Services\ResolutionService;

class ResolutionController extends Controller
{
    public function __construct(
        protected ResolutionService $service
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
    public function store(StoreResolutionRequest $request)
    {
        $this->service->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Resolution $resolution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Resolution $resolution)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateResolutionRequest $request, Resolution $resolution)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resolution $resolution)
    {
        //
    }
}
