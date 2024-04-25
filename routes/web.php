<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ownerController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ImageController;

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

        Route::get('/home', [ownerController::class, 'home'])->name('home');
        Route::resource('/cars', CarController::class)->only(['index']);


        Route::middleware(['user_type'])->group(function () {
        Route::resource('/cars', CarController::class)->except(['index']);
        Route::get('/owner/create', [ownerController::class, 'create'])->name('owner.create');
        Route::post('/owner/store', [ownerController::class, 'store'])->name('owner.store');
        Route::get('/delete/{id}', [ownerController::class, 'delete'])->name('delete');

        Route::get('/owner/edit/{id}', [ownerController::class, 'retrieve'])->name('owner.edit');
        Route::post('/owner/save/{id}', [ownerController::class, 'update'])->name('owner.save');
        Route::get('/cars/{id}/documentDelete',[CarController::class, 'documentDelete'])->name('car.documentDelete');
        Route::post('/cars/{id}/document/store', [CarController::class, 'add_image'])->name('car.add_image');
        });
        Route::get('/setLanguage/{language}', [LanguageController::class, 'setLanguage'])->name("setLanguage");
