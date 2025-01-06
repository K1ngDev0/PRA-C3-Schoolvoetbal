<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MatchController;

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

Route::get('/', function () {
    return view('homepage');
});

Route::get('/register', function () {
    return view('register');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [MatchController::class, 'index']);
// Route::get('/matches', [App\Http\Controllers\MatchController::class, 'index'])->name('matches.index');

Route::get('/matches', function () {
    // Zorg ervoor dat je een view hebt genaamd matches.index
    return view('admin.index');
})->name('admin.index');
