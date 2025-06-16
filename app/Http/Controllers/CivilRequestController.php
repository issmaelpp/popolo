<?php

namespace App\Http\Controllers;

use App\Models\CivilRequest;
use App\Http\Requests\StoreCivilRequestRequest;
use App\Http\Requests\UpdateCivilRequestRequest;
use App\Services\CivilRequestService;

class CivilRequestController extends Controller
{
    public function __construct(
        protected CivilRequestService $service
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
    public function store(StoreCivilRequestRequest $request)
    {
        $this->service->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(CivilRequest $civilRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CivilRequest $civilRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCivilRequestRequest $request, CivilRequest $civilRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CivilRequest $civilRequest)
    {
        //
    }
}
