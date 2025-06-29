<?php

namespace App\Http\Controllers;

use App\Models\Identification;
use App\Http\Requests\StoreIdentificationRequest;
use App\Http\Requests\UpdateIdentificationRequest;
use App\Services\IdentificationService;

class IdentificationController extends Controller
{
    public function __construct(
        protected IdentificationService $service
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
    public function store(StoreIdentificationRequest $request)
    {
        $this->service->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Identification $identification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Identification $identification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIdentificationRequest $request, Identification $identification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Identification $identification)
    {
        //
    }
}
