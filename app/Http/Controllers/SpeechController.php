<?php

namespace App\Http\Controllers;

use App\Models\Speech;
use App\Http\Requests\StoreSpeechRequest;
use App\Http\Requests\UpdateSpeechRequest;

class SpeechController extends Controller
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
    public function store(StoreSpeechRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Speech $speech)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Speech $speech)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSpeechRequest $request, Speech $speech)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Speech $speech)
    {
        //
    }
}
