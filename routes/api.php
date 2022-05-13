<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CovidStatisticsController;

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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('latest-courses', [CourseController::class, 'index'])->name('latest-courses.list');
    Route::get('course/{course}', [CourseController::class, 'view'])->name('course.view');
    Route::post('course', [CourseController::class, 'store'])->name('course.add');
    Route::post('course/activate', [CourseController::class, 'activate'])->name('course.activate');
    Route::get('my-courses', [CourseController::class, 'myCourses'])->name('courses.my-courses');

    Route::get('covid-stats', [CovidStatisticsController::class, 'index'])->name('covid.index');