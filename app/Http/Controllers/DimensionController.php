<?php

namespace App\Http\Controllers;

use App\Models\Dimension;
use App\Http\Requests\StoreDimensionRequest;
use App\Http\Requests\UpdateDimensionRequest;
use App\Services\DimensionService;

class DimensionController extends Controller
{
    public function __construct(
        protected DimensionService $service
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
    public function store(StoreDimensionRequest $request)
    {
        $this->service->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Dimension $dimension)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dimension $dimension)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDimensionRequest $request, Dimension $dimension)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dimension $dimension)
    {
        //
    }
}
