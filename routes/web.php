<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ownerController;
use App\Http\Controllers\CarController;

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
    return view('default');
});


Auth::routes();

Route::get('/home', [ownerController::class, 'home'])->name('home')->middleware('auth');
Route::get('/owner/create', [ownerController::class,'create'])->name('owner.create')->middleware('auth');
Route::post('/owner/store', [ownerController::class,'store'])->name('owner.store')->middleware('auth');
Route::get('/delete/{id}', [ownerController::class,'delete'])->name('delete')->middleware('auth');

Route::get('/owner/edit/{id}',[ownerController::class,'retrieve'])->name('owner.edit')->middleware('auth');
Route::post('/owner/save/{id}',[ownerController::class,'update'])->name('owner.save')->middleware('auth');

Route::resource('/cars', CarController::class)->middleware('auth');
