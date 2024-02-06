<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __invoke()
    {
        // $role = Auth::user()->getRoles();
        // dd($role);
        // dd(Auth::user()->inRole('court-clerk'));

        if (Auth::user()->inRole('client')) {
            return redirect()->route('client.dashboard');
        } else if (Auth::user()->inRole('clerk')) {
            return redirect()->route('clerk.dashboard');
        } else if (Auth::user()->inRole('judge')) {
            return redirect()->route('judge.dashboard');
        } else if (Auth::user()->inRole('lawyer')) {
            return redirect()->route('lawyer.dashboard');
        } else {
            return redirect()->route('client.dashboard');
        }
    }
}
