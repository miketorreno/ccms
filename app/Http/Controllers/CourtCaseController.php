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
            $cases = CourtCase::with(['court', 'parties', 'documents'])->get();

            return view('clerk.cases.index', compact('cases'));
        } else if (Auth::user()->inRole('judge')) {
            $court = Court::where('judge_id', auth()->user()->id)->first();
            if ($court) {
                $cases = CourtCase::with(['parties', 'documents'])->where('court_id', $court->id)->get();
            } else {
                $cases = null;
            }

            return view('judge.dashboard', compact(['court', 'cases']));
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
        // dd($courtCase);
        if (Auth::user()->inRole('clerk')) {
            return view('clerk.cases.show', compact('courtCase'));
        } else if (Auth::user()->inRole('judge')) {
            return view('judge.show', compact('courtCase'));
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
        if (Auth::user()->inRole('judge')) {
            return view('judge.edit', compact(['courtCase']));
        } else if (Auth::user()->inRole('lawyer')) {
            $courts = Court::all();
            return view('lawyer.edit', compact(['courts', 'courtCase']));
        } else {
            return redirect()->route('client.dashboard');
        }
    }

    public function assign(CourtCase $courtCase)
    {
        $courts = Court::all();
        return view('lawyer.assign', compact(['courts', 'courtCase']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CourtCase $courtCase)
    {
        $courtCase->update($request->except(['_token', '_method']));

        if (Auth::user()->inRole('clerk')) {
            return view('clerk.cases.show', compact('courtCase'));
        } else if (Auth::user()->inRole('judge')) {
            return view('judge.show', compact('courtCase'));
        } else if (Auth::user()->inRole('lawyer')) {
            return view('lawyer.show', compact('courtCase'));
        } else {
            return redirect()->route('client.dashboard');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourtCase $courtCase)
    {
        $courtCase->delete();
        $cases = CourtCase::with(['court', 'parties', 'documents'])->where('lawyer_id', auth()->user()->id)->get();
        return view('lawyer.dashboard', compact('cases'));
    }

    public function find()
    {
        $result = null;

        if (Auth::user()->inRole('clerk')) {
            return view('clerk.cases.search', compact('result'));
        } else if (Auth::user()->inRole('judge')) {
            return view('judge.search', compact('result'));
        } else if (Auth::user()->inRole('lawyer')) {
            return view('lawyer.search', compact('result'));
        } else {
            return redirect()->route('client.dashboard');
        }
    }

    public function search(Request $request)
    {
        $result = CourtCase::where('case_number', $request->get('case_number'))->get();
        if (!isset($result[0])) {
            $result['message'] = 'No case found';
        }
        
        if (Auth::user()->inRole('clerk')) {
            return view('clerk.cases.search', compact('result'));
        } else if (Auth::user()->inRole('judge')) {
            $court = Court::where('judge_id', auth()->user()->id)->first();
            if (!$court) {
                $cases = null;
            }
            if (isset($result[0]) && $court != null && $result[0]['court_id'] != $court['id']) {
                $result['message'] = "You're not assigned to this case";
            }

            return view('judge.search', compact('result'));
        } else if (Auth::user()->inRole('lawyer')) {
            if (isset($result[0]) && $result[0]['lawyer_id'] != Auth::user()->id) {
                $result['message'] = "You're not assigned to this case";
            }

            return view('lawyer.search', compact('result'));
        } else {
            return redirect()->route('client.dashboard');
        }
    }
}
