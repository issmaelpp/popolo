<?php

namespace App\Http\Controllers;

use App\Models\Count;
use App\Http\Requests\StoreCountRequest;
use App\Http\Requests\UpdateCountRequest;
use App\Services\CountService;

class CountController extends Controller
{
    public function __construct(
        protected CountService $service
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
    public function store(StoreCountRequest $request)
    {
        $this->service->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Count $count)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Count $count)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCountRequest $request, Count $count)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Count $count)
    {
        //
    }
}
