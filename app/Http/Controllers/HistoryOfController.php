<?php

namespace App\Http\Controllers;

use App\Models\HistoryOf;
use App\Http\Requests\StoreHistoryOfRequest;
use App\Http\Requests\UpdateHistoryOfRequest;
use App\Services\HistoryOfService;

class HistoryOfController extends Controller
{
    public function __construct(
        protected HistoryOfService $service
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
    public function store(StoreHistoryOfRequest $request)
    {
        $this->service->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(HistoryOf $historyOf)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HistoryOf $historyOf)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHistoryOfRequest $request, HistoryOf $historyOf)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HistoryOf $historyOf)
    {
        //
    }
}
