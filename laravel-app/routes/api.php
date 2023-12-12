<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ContactController;

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

Route::get('/test', [TestController::class, 'test']);

Route::get('/pow/{number}', [TestController::class, 'powNumber']);

Route::post('/contact/create', [ContactController::class, 'create']);

Route::get('/contact', [ContactController::class, 'index']);

Route::get('/contact/{contact}', [ContactController::class, 'show']);

Route::put('/contact/{contact}', [ContactController::class, 'update']);

Route::delete('/contact/{contact}', [ContactController::class, 'destroy']);