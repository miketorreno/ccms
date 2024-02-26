<?php

use App\Orchid\Screens\TaskScreen;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourtController;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\CourtCaseController;
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
    return redirect()->route('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::get('/client/dashboard', function () {
        return view('client.dashboard');
    })->name('client.dashboard');
});


// Clerk
Route::group(['middleware' => 'auth', 'prefix' => 'clerk', 'as' => 'clerk.'], function () {
    // court
    Route::get('/courts', [CourtController::class, 'index'])->name('courts.index');
    Route::get('/courts/create', [CourtController::class, 'create'])->name('courts.create');
    Route::post('/courts', [CourtController::class, 'store'])->name('courts.store');

    // cases
    Route::get('/cases', [CourtCaseController::class, 'index'])->name('cases.index');
    Route::get('/cases/create', [CourtCaseController::class, 'create'])->name('cases.create');
    Route::post('/cases', [CourtCaseController::class, 'store'])->name('cases.store');
    Route::get('/cases/{courtCase}', [CourtCaseController::class, 'show'])->name('cases.show');
    Route::get('/courts/search', [CourtCaseController::class, 'find'])->name('cases.find');
    Route::post('/courts/search', [CourtCaseController::class, 'search'])->name('cases.search');

    Route::get('/cases/{courtCase}/parties/create', [PartyController::class, 'create'])->name('cases.parties.create');
    Route::post('/cases/{courtCase}/parties/store', [PartyController::class, 'store'])->name('cases.parties.store');
});


// Lawyer
Route::group(['middleware' => 'auth', 'prefix' => 'lawyer', 'as' => 'lawyer.'], function () {
    Route::get('/dashboard', [CourtCaseController::class, 'index'])->name('dashboard');
    Route::get('/cases/{courtCase}', [CourtCaseController::class, 'show'])->name('cases.show');
    Route::get('/cases/{courtCase}/edit', [CourtCaseController::class, 'edit'])->name('cases.edit');
    Route::get('/cases/{courtCase}/assign', [CourtCaseController::class, 'assign'])->name('cases.assign');
    Route::put('/cases/{courtCase}', [CourtCaseController::class, 'update'])->name('cases.update');
    Route::delete('/cases/{courtCase}', [CourtCaseController::class, 'destroy'])->name('cases.delete');
    Route::get('/courts/search', [CourtCaseController::class, 'find'])->name('cases.find');
    Route::post('/courts/search', [CourtCaseController::class, 'search'])->name('cases.search');

    Route::get('/cases/{courtCase}/parties/create', [PartyController::class, 'create'])->name('cases.parties.create');
    Route::post('/cases/{courtCase}/parties/store', [PartyController::class, 'store'])->name('cases.parties.store');
    Route::get('/cases/{courtCase}/parties/{party}/edit', [PartyController::class, 'edit'])->name('cases.parties.edit');
    Route::put('/cases/{courtCase}/parties/{party}', [PartyController::class, 'update'])->name('cases.parties.update');
    Route::delete('/cases/{courtCase}/parties/{party}', [PartyController::class, 'destroy'])->name('cases.parties.delete');

    Route::get('/cases/{courtCase}/documents/create', [DocumentController::class, 'create'])->name('cases.documents.create');
    Route::post('/cases/{courtCase}/documents/store', [DocumentController::class, 'store'])->name('cases.documents.store');
});


// Judge
Route::group(['middleware' => 'auth', 'prefix' => 'judge', 'as' => 'judge.'], function () {
    Route::get('/dashboard', [CourtCaseController::class, 'index'])->name('dashboard');
    Route::get('/cases/{courtCase}', [CourtCaseController::class, 'show'])->name('cases.show');
    Route::get('/cases/{courtCase}/edit', [CourtCaseController::class, 'edit'])->name('cases.edit');
    Route::put('/cases/{courtCase}', [CourtCaseController::class, 'update'])->name('cases.update');
    Route::get('/courts/search', [CourtCaseController::class, 'find'])->name('cases.find');
    Route::post('/courts/search', [CourtCaseController::class, 'search'])->name('cases.search');
});


Route::screen('task', TaskScreen::class)->name('platform.task');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
