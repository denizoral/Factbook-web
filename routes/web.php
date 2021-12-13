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

Route::get('/post/{post}', [PostController::class, 'show']);

Route::post('/addpost', [PostController::class, 'addPost']);

Route::post('/post/{post}/comments', [CommentsController::class, 'store']);

Route::delete('/comments/{comment}' [CommentsController::class, 'destroy']);


require __DIR__.'/auth.php';