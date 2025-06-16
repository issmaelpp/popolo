<?php

namespace App\Http\Controllers;

use App\Models\CouncilPost;
use App\Http\Requests\StoreCouncilPostRequest;
use App\Http\Requests\UpdateCouncilPostRequest;
use App\Services\CouncilPostService;

class CouncilPostController extends Controller
{
    public function __construct(
        protected CouncilPostService $service
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
    public function store(StoreCouncilPostRequest $request)
    {
        $this->service->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(CouncilPost $councilPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CouncilPost $councilPost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCouncilPostRequest $request, CouncilPost $councilPost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CouncilPost $councilPost)
    {
        //
    }
}
