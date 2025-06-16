<?php

namespace App\Http\Controllers;

use App\Models\Motion;
use App\Http\Requests\StoreMotionRequest;
use App\Http\Requests\UpdateMotionRequest;

class MotionController extends Controller
{
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
    public function store(StoreMotionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Motion $motion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Motion $motion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMotionRequest $request, Motion $motion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Motion $motion)
    {
        //
    }
}
