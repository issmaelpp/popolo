<?php

namespace App\Http\Controllers;

use App\Models\InternationalClassification;
use App\Http\Requests\StoreInternationalClassificationRequest;
use App\Http\Requests\UpdateInternationalClassificationRequest;
use App\Services\InternationalClassificationService;

class InternationalClassificationController extends Controller
{
    public function __construct(
        protected InternationalClassificationService $service
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
    public function store(StoreInternationalClassificationRequest $request)
    {
        $this->service->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(InternationalClassification $internationalClassification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InternationalClassification $internationalClassification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInternationalClassificationRequest $request, InternationalClassification $internationalClassification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InternationalClassification $internationalClassification)
    {
        //
    }
}
