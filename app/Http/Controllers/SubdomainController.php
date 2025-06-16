<?php

namespace App\Http\Controllers;

use App\Models\Subdomain;
use App\Http\Requests\StoreSubdomainRequest;
use App\Http\Requests\UpdateSubdomainRequest;
use App\Services\SubdomainService;

class SubdomainController extends Controller
{
    public function __construct(
        protected SubdomainService $service
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
    public function store(StoreSubdomainRequest $request)
    {
        $this->service->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Subdomain $subdomain)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subdomain $subdomain)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubdomainRequest $request, Subdomain $subdomain)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subdomain $subdomain)
    {
        //
    }
}
