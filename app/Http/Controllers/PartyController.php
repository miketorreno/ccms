<?php

namespace App\Http\Controllers;

use App\Models\Party;
use Illuminate\Http\Request;
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
            // 'user_id' => $request->get('user_id'),
            'name' => $request->get('name'),
            'address' => $request->get('address'),
            'phone_number' => $request->get('phone_number'),
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePartyRequest $request, Party $party)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Party $party)
    {
        //
    }
}
