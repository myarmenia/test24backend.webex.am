<?php

use App\Http\Controllers\API\ContactController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\GoogleController;
use App\Services\FileUploadService;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('google',[GoogleAuthController::class,'redirect'])->name('auth-google');

// Route::get('auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle']);
Route::get('google', [GoogleController::class, 'redirectToGoogle'])->name('auth-google');
Route::get('auth/google/call-back', [GoogleController::class, 'handleGoogleCallback']);

Route::get('get-file', [FileUploadService::class, 'get_file'])->name('get-file');



Route::get('get-email',[ContactController::class,'show']);
