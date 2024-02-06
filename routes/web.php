<?php

use App\Orchid\Screens\TaskScreen;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
});

// Client
Route::middleware(['auth'])->group(function () {
    Route::get('/client/dashboard', function () {
        return view('client.dashboard');
    })->name('client.dashboard');
});

// Clerk
Route::middleware(['auth'])->group(function () {
    Route::get('/clerk/dashboard', function () {
        return view('clerk.dashboard');
    })->name('clerk.dashboard');
});

// Judge
Route::middleware(['auth'])->group(function () {
    Route::get('/judge/dashboard', function () {
        return view('judge.dashboard');
    })->name('judge.dashboard');
});

// Lawyer
Route::middleware(['auth'])->group(function () {
    Route::get('/lawyer/dashboard', function () {
        return view('lawyer.dashboard');
    })->name('lawyer.dashboard');
});

Route::screen('task', TaskScreen::class)->name('platform.task');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
