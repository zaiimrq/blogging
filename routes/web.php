<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', fn () => view('home', ['title' => 'Home']));
Route::get('/about', fn () => view('about', ['title' => 'About']));
Route::get('/categories', fn () => view('categories', ['title' => 'Categories']));
Route::controller(PostController::class)->group(fn () => [Route::get('/posts', 'index'), Route::get('/posts/{post}', 'show')]);