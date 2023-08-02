<?php

use App\Http\Controllers\Api\CoursesController;
use App\Http\Controllers\Api\LessonController;
use App\Http\Controllers\Api\VocabularyController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(
    function () {
        Route::get('/logout',[AuthController::class,'logout']);
    }
);
Route::middleware('guest')->group(
    function(){
        Route::post('/login', [AuthController::class, 'login']);
        Route::post('/register', [AuthController::class, 'register']);
    }
);


Route::post('password/email',  ForgotPasswordController::class);
Route::post('password/reset', ResetPasswordController::class);


Route::get('/home', function () {
    return response('hello world', 200)->header('Content-Type', 'text/plain');
});

Route::get('/course/{id}', [CoursesController::class, 'show']);
Route::post('course', [CoursesController::class, 'store']);
Route::put('/course/{id}', [CoursesController::class, 'update']);
Route::delete('/course/{id}', [CoursesController::class, 'destroy']);



Route::get('/lesson/course_id/{id}', [LessonController::class, 'index']);
Route::post('/lesson', [LessonController::class, 'store']);
Route::get('/lesson/{id}', [LessonController::class, 'show']);
Route::delete('/lesson/{id}', [LessonController::class, 'destroy']);
Route::put('/lesson/{id}', [LessonController::class, 'update']);


Route::post('/vocabulary', [VocabularyController::class, 'store']);
Route::get('/vocabulary/lesson_id/{id}', [VocabularyController::class, 'index']);
Route::get('/vocabulary/{id}', [VocabularyController::class, 'show']);
Route::put('/vocabulary/{id}', [VocabularyController::class, 'update']);
Route::delete('/vocabulary/{id}', [VocabularyController::class, 'destroy']);
