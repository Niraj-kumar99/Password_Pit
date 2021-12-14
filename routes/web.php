<?php

use Illuminate\Support\Facades\Route;
use App\Models\Pit;
use App\Http\Controllers\PitController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/dashboard', function () {
////    return view('dashboard')->with('pit_arr', Pit::all());
//})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/create', function () {
    return view('create');
});

Route::get('/dashboard', [PitController::class, 'index'])->middleware(['auth'])->name('dashboard');

//Route::get('/showpits', [PitController::class, 'index']);
Route::get('/save_site', [PitController::class, 'store']);
Route::get('/edit/{id}', [PitController::class, 'edit']);
Route::get('/update_list/{id}', [PitController::class, 'update']);
Route::get('/delete/{id}', [PitController::class, 'destroy']);
Route::get('/showPassword/{id}', [PitController::class, 'showPassword']);
Route::get('/editPassword/{id}', [PitController::class, 'editPassword']);
Route::get('/update_Password/{id}', [PitController::class, 'update_Password']);

Route::get('/matchPassword/{id}', [PitController::class, 'matchPassword']);


