<?php

namespace App\Http\Controllers;

use App\Models\Segment;
use App\Http\Requests\StoreSegmentRequest;
use App\Http\Requests\UpdateSegmentRequest;
use App\Services\SegmentService;

class SegmentController extends Controller
{
    public function __construct(
        protected SegmentService $service
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
    public function store(StoreSegmentRequest $request)
    {
        $this->service->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Segment $segment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Segment $segment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSegmentRequest $request, Segment $segment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Segment $segment)
    {
        //
    }
}
