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

// Route::get('/dashboard', function () {
//     return view('index');
// })->middleware(['auth'])->name('index');

Route::get('/dashboard', [PostController::class, 'index']);

Route::get('/post/new', [PostController::class, 'create']);

Route::get('/post/{id}', [PostController::class, 'show']);

Route::post('/addpost', [PostController::class, 'addPost']);

Route::post('/post/{id}/comments', [CommentsController::class, 'store']);

Route::post('/editpost/{id}', [PostController::class, 'edit']);

Route::post('/editcomment/{id}', [CommentsController::class, 'edit']);

Route::delete('/post/delete/{id}', [PostController::class, 'destroy']);

Route::delete('/comment/delete/{id}', [CommentsController::class, 'destroy']);


require __DIR__.'/auth.php';