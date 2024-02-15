<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Court;
use App\Models\CourtCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCourtCaseRequest;
use App\Http\Requests\UpdateCourtCaseRequest;

class CourtCaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->inRole('clerk')) {
            $cases = CourtCase::with(['court', 'parties'])->get();
            return view('clerk.cases.index', compact('cases'));
        } else if (Auth::user()->inRole('judge')) {
            return redirect()->route('judge.dashboard');
        } else if (Auth::user()->inRole('lawyer')) {
            $cases = CourtCase::with(['court', 'parties'])->where('lawyer_id', auth()->user()->id)->get();
            return view('lawyer.dashboard', compact('cases'));
        } else {
            return redirect()->route('client.dashboard');
        }
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
        if (Auth::user()->inRole('clerk')) {
            return view('clerk.cases.show', compact('courtCase'));
        } else if (Auth::user()->inRole('judge')) {
            return redirect()->route('judge.dashboard');
        } else if (Auth::user()->inRole('lawyer')) {
            return view('lawyer.show', compact('courtCase'));
        } else {
            return redirect()->route('client.dashboard');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourtCase $courtCase)
    {
        $courts = Court::all();
        return view('lawyer.edit', compact(['courts', 'courtCase']));

        // if (Auth::user()->inRole('clerk')) {
        //     return view('clerk.cases.show', compact('courtCase'));
        // } else if (Auth::user()->inRole('judge')) {
        //     return redirect()->route('judge.dashboard');
        // } else if (Auth::user()->inRole('lawyer')) {
        //     return view('lawyer.edit', compact(['courts', 'courtCase']));
        // } else {
        //     return redirect()->route('client.dashboard');
        // }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CourtCase $courtCase)
    {
        $courtCase->update($request->except(['_token', '_method']));

        return view('lawyer.show', compact('courtCase'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourtCase $courtCase)
    {
        $courtCase->delete();
        $cases = CourtCase::with(['court', 'parties'])->where('lawyer_id', auth()->user()->id)->get();
        return view('lawyer.dashboard', compact('cases'));
    }
}
