<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
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


Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {

    Route::middleware('throttle:post-api')->post('/posts', [PostController::class, 'store']);
    
    Route::middleware('throttle:api')->get('/index', [PostController::class, 'index']);
    
    Route::middleware('throttle:post-api')->patch('/posts/{id}', [PostController::class, 'update']);
    Route::middleware('throttle:post-api')->delete('/posts/{id}', [PostController::class, 'destroy']);

    Route::apiResource('posts.comments', CommentController::class);
});


// Route::middleware('auth:sanctum')->group(function () {
//         Route::post('/logout', [AuthController::class, 'logout']);

//     Route::post('/posts', [PostController::class, 'store']);
//     Route::get('/index', [PostController::class, 'index']);
//     Route::patch('/posts/{id}', [PostController::class, 'update']);
//     Route::delete('/posts/{id}', [PostController::class, 'destroy']);

//     // Route::apiResource('posts.comments', CommentController::class)->shallow();
//     Route::apiResource('posts.comments', CommentController::class);

// });

// Route::middleware('auth:sanctum')->post('/posts', [PostController::class, 'store']);
//  Route::get('/posts', [PostController::class, 'index']);