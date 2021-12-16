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

//Route::get('/dashboard', [PitController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::get('/dashboard', [PitController::class, 'index'])->middleware(['auth'])->name('dashboard');


Route::get('/showpits', [PitController::class, 'index']);
Route::get('/save_site', [PitController::class, 'store']);
Route::get('/edit/{id}', [PitController::class, 'edit'])->name('edit');
Route::get('/update_list/{id}', [PitController::class, 'update']);
Route::get('/delete/{id}', [PitController::class, 'destroy'])->name('delete');
Route::get('/showPassword/{id}', [PitController::class, 'showPassword'])->name('showpassword');
Route::get('/editPassword/{id}', [PitController::class, 'editPassword'])->name('editpassword');
Route::get('/update_Password/{id}', [PitController::class, 'update_Password']);

Route::get('/matchPassword/{id}', [PitController::class, 'matchPassword']);


//Route::get('employee', [EmpController::class, 'index']);
//Route::get('emp/listing', [EmpController::class, 'getEmployees'])->name('emp.listing');

//Route::get('sites', [PitController::class, 'index']);
Route::get('site/listing', [PitController::class, 'getAll'])->name('getsites');






//Route::get('send-mail', function () {
//
//    $details = [
//        'title' => 'Mail from Password Pit',
//        'body' => 'This is for testing email using smtp'
//    ];
//
//    \Mail::to('kumarnkj35@gmail.com')->send(new \App\Mail\MyTestMail($details));
//
//    dd("Email is Sent.");
//});


