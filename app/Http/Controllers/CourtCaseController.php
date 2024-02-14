<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Court;
use App\Models\CourtCase;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCourtCaseRequest;
use App\Http\Requests\UpdateCourtCaseRequest;

class CourtCaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cases = CourtCase::with(['court', 'parties'])->get();
        
        return view('clerk.cases.index', compact('cases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courts = Court::all();
        $lawyers = User::filterLawyers();

        return view('clerk.cases.create', compact(['courts', 'lawyers']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $courtCase = CourtCase::query()
            ->create($request->all());

        return view('clerk.cases.show', compact('courtCase'));
        
    }

    /**
     * Display the specified resource.
     */
    public function show(CourtCase $courtCase)
    {
        return view('clerk.cases.show', compact('courtCase'));
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
