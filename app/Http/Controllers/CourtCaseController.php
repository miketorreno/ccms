<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourtCaseRequest;
use App\Http\Requests\UpdateCourtCaseRequest;
use App\Models\CourtCase;

class CourtCaseController extends Controller
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
    public function store(StoreCourtCaseRequest $request)
    {
        // $case = new CourtCase();
        CourtCase::query()
            ->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(CourtCase $courtCase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourtCase $courtCase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourtCaseRequest $request, CourtCase $courtCase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourtCase $courtCase)
    {
        //
    }
}
