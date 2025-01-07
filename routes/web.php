<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\AuthController;


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

Route::get('', function () {
    return view('welcome');
});

Route::get('/', [MatchController::class, 'index'])->name('homepage');

// Custom authentication routes
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

use App\Http\Controllers\TeamsController;

Route::get('/teams/create', [TeamsController::class, 'showCreateForm'])->name('teams.create');
Route::post('/teams/create', [TeamsController::class, 'create'])->name('teams.store');

use App\Http\Controllers\TourneyController;

Route::get('/tournaments/create', [TourneyController::class, 'showCreateForm'])->name('tournaments.create');
Route::post('/tournaments/create', [TourneyController::class, 'create'])->name('tournaments.store');
// Protected routes
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/matches', function () {
        // Ensure you have a view named matches.index
        return view('admin.index');
    })->name('admin.index');
});
