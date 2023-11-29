<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlController;

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


Auth::routes();

Route::get('/', [UrlController::class, 'show'])->name('show');
Route::get('/create', [UrlController::class, 'create'])->name('create');
Route::post('/create', [UrlController::class, 'generate'])->name('generate');
Route::get('/redirect/{shortUrl}', [UrlController::class, 'away'])->name('away');
Route::get('/update/{id}', [UrlController::class, 'update'])->name('update');
Route::post('/update/{id}', [UrlController::class, 'postUpdate'])->name('postUpdate');
Route::get('/delete/{id}', [UrlController::class, 'delete'])->name('delete');

