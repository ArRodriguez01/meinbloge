<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PublicationsController;
use App\Http\Controllers\AllPublicationsController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::resource('posts',PostController::class)
    ->only(['index','store','edit','update','destroy'])
    ->middleware(['auth','verified']);


Route::post('/comment/{post}',[CommentController::class,'store'])->middleware(['auth','verified'])->name('comment');
Route::delete('/comment/{post}',[CommentController::class,'delete'])->middleware(['auth','verified'])->name('comment');
Route::get('/users',[UsersController::class,'index'])->name('users');
Route::get('/publications',[PublicationsController::class,'index'])->name('publications');
Route::get('/allpublications',[AllPublicationsController::class,'index'])->name('allpublications');
Route::delete('/allpublications/{post}',[AllPublicationsController::class,'destroy'])->name('destroyallpublications');
Route::get('/users/{id}/edit', [UsersController::class,'edit'])->name('users.edit');
Route::put('/users/{id}', [UsersController::class,'update'])->name('users.update');
Route::delete('/users/{id}', [UsersController::class,'destroy'])->name('users.destroy');
require __DIR__.'/auth.php';
