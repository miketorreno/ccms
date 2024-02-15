<?php

namespace App\Http\Controllers;

use App\Models\Party;
use App\Models\CourtCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePartyRequest;
use App\Http\Requests\UpdatePartyRequest;

class PartyController extends Controller
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
        return view('clerk.parties.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Party::create([
            'court_case_id' => $request->get('court_case_id'),
            'name' => $request->get('name'),
            'address' => $request->get('address'),
            'national_id' => $request->get('national_id'),
            'military_id' => $request->get('military_id'),
            'phone_number' => $request->get('phone_number'),
            'attorney' => $request->get('attorney'),
            'party_type' => $request->get('party_type'),
        ]);

        return redirect()->route('clerk.cases.show', [$request->get('court_case_id')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Party $party)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Party $party)
    {
        return view('lawyer.parties.edit', compact('party'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CourtCase $courtCase, Party $party)
    {
        $courtCase->update($request->except(['_token', '_method']));

        return view('lawyer.show', compact('courtCase'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourtCase $courtCase, Party $party)
    {
        $party->delete();

        return view('lawyer.show', compact('courtCase'));
    }
}
