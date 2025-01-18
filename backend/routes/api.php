<?php

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

// api/v1

Route::group(['prefix'=>'v1','namespace'=>'App\Http\Controllers\Api\V1'],function()
{
    Route::apiResource('vacancies',VacancyController::class);
    Route::apiResource('projects',ProjectController::class);
    Route::apiResource('notices',NoticeController::class);
    Route::apiResource('feedbacks',FeedbackController::class);
    Route::apiResource('employees',EmployeeController::class);
    Route::apiResource('deathrecords',DeathRecordController::class);
    Route::apiResource('birthrecords',BirthRecordController::class);



});


