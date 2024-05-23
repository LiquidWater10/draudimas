<?php

use Illuminate\Http\Request;
USE App\Http\Requests\CarRequest;
use App\Http\Controllers\OwnerControllerAPI;
use App\Http\Controllers\CarControllerAPI;
use App\Models\owner;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/owners', [OwnerControllerAPI::class, 'owners']);
Route::get('/owners/{id}', [OwnerControllerAPI::class, 'owner']);
Route::post('/owners', [OwnerControllerAPI::class, 'store']);
Route::put('/owners/{id}', [OwnerControllerAPI::class, 'update']);
Route::delete('/owners/{id}', [OwnerControllerAPI::class, 'destroy']);

Route::get('/cars', [CarControllerAPI::class, 'cars']);
Route::get('/cars/{id}', [CarControllerAPI::class, 'car']);
Route::post('/cars', [CarControllerAPI::class, 'store']);
Route::put('/cars/{id}', [CarControllerAPI::class, 'update']);
Route::delete('/cars/{id}', [CarControllerAPI::class, 'destroy']);
