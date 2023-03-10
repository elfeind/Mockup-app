<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;

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

Route::post('/auth/dologin', [App\Http\Controllers\Auth\LoginController::class, 'dologin'])->name('dologin');
Route::post('/createOrUpdateBiodata', [App\Http\Controllers\HomeController::class, 'createOrUpdateBiodata'])->name('createOrUpdateBiodata');
Route::get('/biodataList', [App\Http\Controllers\HomeController::class, 'biodataList'])->name('biodataList');
Route::get('/dtBiodata', [App\Http\Controllers\HomeController::class, 'dtBiodata'])->name('dtBiodata');
Route::get('/detailBiodata/{id}/{action}', [App\Http\Controllers\HomeController::class, 'detailBiodata'])->name('detailBiodata');
Route::get('/deleteBiodata/{id}', [App\Http\Controllers\HomeController::class, 'deleteBiodata'])->name('deleteBiodata');


Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
