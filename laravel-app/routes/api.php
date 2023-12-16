<?php

use App\Http\Controllers\CommentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/test', [TestController::class, 'test']);

Route::get('/pow/{number}', [TestController::class, 'powNumber']);

Route::prefix('/contact')->group(function () {
    Route::post('/create', [ContactController::class, 'create']);
    Route::get('', [ContactController::class, 'index']);
    Route::get('/{contact}', [ContactController::class, 'show']);
    Route::put('/{contact}', [ContactController::class, 'update']);
    Route::delete('/{contact}', [ContactController::class, 'destroy']);
});

Route::prefix('/users')->group(function () {
    Route::post('/create', [UserController::class, 'create']);
    Route::prefix('/{user}')->group(function () {
        Route::get('', [UserController::class, 'show']);
        Route::put('', [UserController::class, 'update']);
        Route::delete('', [UserController::class, 'destroy']);

        Route::prefix('/posts')->group(function () {
            Route::get('', [PostController::class, 'show']);
            Route::post('/create', [PostController::class, 'create']);
            Route::prefix('/{post}')->group(function () { 
                Route::put('', [PostController::class, 'update']);
                Route::delete('', [PostController::class, 'destroy']);

                Route::prefix('/comments')->group(function () {
                    Route::get('', [CommentController::class, 'show']);
                    Route::post('/create', [CommentController::class, 'create']);  
                    Route::prefix('/{comment}')->group(function () { 
                        Route::put('', [CommentController::class, 'update']); 
                        Route::delete('', [CommentController::class, 'destroy']);
                    });                
                });

                Route::prefix('/tags')->group(function () {
                    Route::get('', [TagController::class, 'show']);
                    Route::post('/create', [TagController::class, 'create']);  
                    Route::prefix('/{tag}')->group(function () { 
                        Route::put('', [TagController::class, 'update']); 
                        Route::delete('', [TagController::class, 'destroy']);
                    });                
                });
            });
        });
    });
});