<?php

namespace App\Http\Controllers;

use App\Models\Neighborhood;
use App\Http\Requests\StoreNeighborhoodRequest;
use App\Http\Requests\UpdateNeighborhoodRequest;
use App\Services\NeighborhoodService;

class NeighborhoodController extends Controller
{
    public function __construct(
        protected NeighborhoodService $service
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
    public function store(StoreNeighborhoodRequest $request)
    {
        $this->service->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Neighborhood $neigborhood)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Neighborhood $neigborhood)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNeighborhoodRequest $request, Neighborhood $neigborhood)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Neighborhood $neigborhood)
    {
        //
    }
}
