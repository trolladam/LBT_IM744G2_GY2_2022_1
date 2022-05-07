<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Route::get('/', [Controllers\HomeController::class, 'index'])->name('home');

Route::get('/topic/{topic}', [Controllers\TopicController::class, 'show'])->name('topic.details');
Route::get('/post/{post}', [Controllers\PostController::class, 'show'])->name('post.details');
Route::get('/profile/{user}', [Controllers\ProfileController::class, 'show'])->name('profile.details');

Route::middleware('auth')->group(function () {
    Route::get('/publish', [Controllers\PostController::class, 'create'])->name('post.create');
    Route::post('/publish', [Controllers\PostController::class, 'store']);
});

require __DIR__ . '/auth.php';
