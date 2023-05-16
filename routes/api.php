<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemsController;

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


// category crud
Route::post('/category', [CategoryController::class, 'store']);
Route::put('/category/{id}', [CategoryController::class, 'update']);
Route::delete('/category/{id}', [CategoryController::class, 'destroy']);
Route::get('/category', [CategoryController::class, 'index']);
//items
Route::post('/items', [ItemsController::class, 'store']);
Route::put('/items/{id}', [ItemsController::class, 'update']);
Route::delete('/items/{id}', [ItemsController::class, 'destroy']);
Route::get('/items', [ItemsController::class, 'index']);


