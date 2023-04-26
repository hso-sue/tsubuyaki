<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\CommentController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/index', [TweetController::class, 'index'])->name('tweets.index');
Route::get('/create', [TweetController::class, 'create'])->name('tweets.create');
Route::post('/store', [TweetController::class, 'store'])->name('tweets.store');
Route::get('/edit/{id}', [TweetController::class, 'edit'])->name('tweets.edit');
Route::post('/update/{id}', [TweetController::class, 'update'])->name('tweets.update');
Route::post('/destroy/{id}', [TweetController::class, 'destroy'])->name('tweets.destroy');
Route::get('/show/{id}', [TweetController::class, 'show'])->name('tweets.show');

Route::post('/{tweet}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::post('/comments/destroy/{id}/{tweetId}', [CommentController::class, 'destroy'])->name('comments.destroy');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
