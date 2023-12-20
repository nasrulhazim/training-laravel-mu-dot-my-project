<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\Student\ManageCourseController;
use App\Http\Controllers\StudentController;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('courses', CourseController::class);

    Route::resource('students', StudentController::class);

    Route::get('manage-courses/{student}/create', [
        ManageCourseController::class, 'create'
    ])->name('manage-courses.create');

    Route::post('manage-courses/{student}', [
        ManageCourseController::class, 'store'
    ])->name('manage-courses.store');

    Route::delete('manage-courses/{student}/{course}', [
        ManageCourseController::class, 'destroy'
    ])->name('manage-courses.destroy');
});
