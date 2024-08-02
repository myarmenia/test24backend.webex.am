<?php

use App\Http\Controllers\API\AnswerTypesController;
use App\Http\Controllers\API\ContactController;
use App\Http\Controllers\API\DeleteRecordController;
use App\Http\Controllers\API\GetAllQuestionariesController;
use App\Http\Controllers\API\GetAllTestController;
use App\Http\Controllers\API\GetAuthAllTestController;
use App\Http\Controllers\API\GetCategoryController;
use App\Http\Controllers\API\GetGradeController;
use App\Http\Controllers\API\GetTestViaLinkController;
use App\Http\Controllers\API\TestAuthController;
use App\Http\Controllers\API\TestController;
use App\Http\Controllers\API\UserPastedTestController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix' => 'auth'

], function ($router) {

    Route::group(["middleware"=> ['setlang']],function ($router) {
        Route::post('register',RegisterController::class);
        Route::post('login', [AuthController::class, 'login']);
        Route::post('logout', [AuthController::class,'logout']);
        Route::post('refresh', [AuthController::class,'refresh']);
        Route::post('me', [AuthController::class, 'me']);
        



        Route::group(["middleware"=> ['apiAuth']],function ($router) {
            // creting test
        Route::post('test',TestController::class);
        Route::get('tests-auth',[GetAuthAllTestController::class,'index']);
        Route::delete('delete/{id}',[DeleteRecordController::class,'delete']);
        Route::get('edit/{id}',[TestAuthController::class,'edit']);
        Route::put('update/{id}',[TestAuthController::class,'update']);



        });

    });
});

Route::group(["middleware"=> ['setlang']],function ($router) {
    Route::get('get-categories', GetCategoryController::class);
    Route::get('get-answer-types', [AnswerTypesController::class,'index']);
    Route::get('get-grades',[GetGradeController::class,'index']);

    Route::get('test/{link}',GetTestViaLinkController::class);
    // not auth user pass test
    Route::post('pass-test',UserPastedTestController::class);

    Route::get('get-all-tests',[GetAllTestController::class,'index']);
    Route::post('send-email',[ContactController::class,'index']);


});

Route::get('google', [GoogleController::class, 'redirectToGoogle'])->name('google-auth');
Route::post('auth/google/call-back', [GoogleController::class, 'handleGoogleCallback']);




