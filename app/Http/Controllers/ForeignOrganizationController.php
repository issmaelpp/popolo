<?php

namespace App\Http\Controllers;

use App\Models\ForeignOrganization;
use App\Http\Requests\StoreForeignOrganizationRequest;
use App\Http\Requests\UpdateForeignOrganizationRequest;
use App\Services\ForeignOrganizationService;

class ForeignOrganizationController extends Controller
{
    public function __construct(
        protected ForeignOrganizationService $service
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
    public function store(StoreForeignOrganizationRequest $request)
    {
        $this->service->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(ForeignOrganization $foreignOrganization)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ForeignOrganization $foreignOrganization)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateForeignOrganizationRequest $request, ForeignOrganization $foreignOrganization)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ForeignOrganization $foreignOrganization)
    {
        //
    }
}
