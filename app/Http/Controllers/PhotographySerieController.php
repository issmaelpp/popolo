<?php

namespace App\Http\Controllers;

use App\Models\PhotographySerie;
use App\Http\Requests\StorePhotographySerieRequest;
use App\Http\Requests\UpdatePhotographySerieRequest;
use App\Services\PhotographySerieService;

class PhotographySerieController extends Controller
{
    public function __construct(
        protected PhotographySerieService $service
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
    public function store(StorePhotographySerieRequest $request)
    {
        $this->service->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(PhotographySerie $photographySerie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PhotographySerie $photographySerie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePhotographySerieRequest $request, PhotographySerie $photographySerie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PhotographySerie $photographySerie)
    {
        //
    }
}
