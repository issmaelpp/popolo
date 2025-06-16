<?php

namespace App\Http\Controllers;

use App\Models\CulturalCycle;
use App\Http\Requests\StoreCulturalCycleRequest;
use App\Http\Requests\UpdateCulturalCycleRequest;
use App\Services\CulturalCycleService;

class CulturalCycleController extends Controller
{
    public function __construct(
        protected CulturalCycleService $service
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
    public function store(StoreCulturalCycleRequest $request)
    {
        $this->service->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(CulturalCycle $culturalCycle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CulturalCycle $culturalCycle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCulturalCycleRequest $request, CulturalCycle $culturalCycle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CulturalCycle $culturalCycle)
    {
        //
    }
}
