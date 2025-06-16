<?php

namespace App\Http\Controllers;

use App\Models\TrafficLine;
use App\Http\Requests\StoreTrafficLineRequest;
use App\Http\Requests\UpdateTrafficLineRequest;
use App\Services\TrafficLineService;

class TrafficLineController extends Controller
{
    public function __construct(
        protected TrafficLineService $service
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
    public function store(StoreTrafficLineRequest $request)
    {
        $this->service->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(TrafficLine $trafficLine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TrafficLine $trafficLine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTrafficLineRequest $request, TrafficLine $trafficLine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TrafficLine $trafficLine)
    {
        //
    }
}
