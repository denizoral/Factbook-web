<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentsController;

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

Route::get('/dashboard', [PostController::class, 'index']);

Route::get('/post/new', [PostController::class, 'create']);

Route::get('/post/{id}', [PostController::class, 'show']);

Route::get('/editpost/{id}', [PostController::class, 'edit']);

Route::get('/editcomment/{id}', [CommentsController::class, 'edit']);

Route::post('/addpost', [PostController::class, 'store']);

Route::post('/post/{id}/comments', [CommentsController::class, 'store']);

Route::put('/updatepost/{id}', [PostController::class, 'update']);

Route::put('/updatecomment/{id}', [CommentsController::class, 'update']);

Route::delete('/post/delete/{id}', [PostController::class, 'destroy']);

Route::delete('/comment/delete/{id}', [CommentsController::class, 'destroy']);


require __DIR__.'/auth.php';